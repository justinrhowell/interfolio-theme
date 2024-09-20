import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import info from "./package.json";
import browserSync from "browser-sync";
import wpPot from "gulp-wp-pot";

const PRODUCTION = yargs.argv.prod;

const server = browserSync.create();
export const serve = done => {
  server.init({
    proxy: "http://interfolio-web.lndo.site/"
  });
  done();
};
export const reload = done => {
  server.reload();
  done();
};

export const styles = () => {
  return src('src/scss/bundle.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'))
    .pipe(server.stream());
}

export const scripts = () => {
  return src('src/js/bundle.js')
  .pipe(webpack({
    module: {
      rules: [
        {
          test: /\.js$/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: 'bundle.js'
    },
    externals: {
      jquery: 'jQuery'
    },
  }))
  .pipe(dest('dist/js'));
}

export const images = () => {
  return src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/images'));
}

export const copy = () => {
  return src(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'])
    .pipe(dest('dist'));
}

export const watchForChanges = () => {
  watch('src/scss/**/*.scss', styles);
  watch('src/js/**/*.js', series(scripts, reload));
  watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, reload));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], series(copy, reload));
  watch("**/*.php", reload);
}

export const pot = () => {
  return src("**/*.php")
  .pipe(
      wpPot({
        domain: "_interfolio",
        package: info.name
      })
    )
  .pipe(dest(`languages/${info.name}.pot`));
};

export const clean = () => del(['dist']);

export const dev = series(clean, parallel(styles, images, copy, scripts), serve, watchForChanges)

export const build = series(clean, parallel(styles, images, copy, scripts), pot)

export default dev;