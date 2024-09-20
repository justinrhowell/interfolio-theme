( function( $ ) {

    const searchInput = $( '#search-input' );
    let contentTypes;

    $(document).ready( getContentTypes );

    const debounce = (fn, time) => {
        let timeout;

        return function () {
            const functionCall = () => fn.apply(this, arguments);
            clearTimeout(timeout);
            timeout = setTimeout(functionCall, time);
        }
    }

    async function triggerSearch(page = 1, contentType = 'all'){
        const searchParam = searchInput.val();
        const itemsPerPage = 5;
        let url = `/wp-json/interfolio-rest/v1/search?query=${ searchParam }&per_page=${ itemsPerPage }`;
        url += page ? `&page=${ page }` : '';
        if( contentType && contentType !== 'all' ){
            const params = JSON.parse(contentType);
            url += params.type ? `&post_type=${ params.type }` : '';
            url += params.tax ? `&tax=${ params.tax }` : '';
            url += params.term ? `&term=${ params.term }` : '';
        }
        console.log( url );
        const req = await fetch( url );
        if ( req.ok ) {
            const body = await req.json();
			const totalResults = parseFloat( body.total_results );
            handleSearchResults( body.results );
            handleSearchMeta( page, itemsPerPage, totalResults, contentType );
            handlePaginationControls( page, itemsPerPage, totalResults );
        } else {
            showErrorMessage( 'Sorry, We could not complete that request!' );
        }
    }

    async function getContentTypes(){
        const req = await fetch('/wp-json/interfolio-rest/v1/types');
        if(req.ok){
            contentTypes = await req.json();
        }
    }

    function handleSearchResults( results ){
        let html = '';
        results.forEach( (result) => {
            const formattedType = result.type.toLowerCase().split(' ').join('-');
            html += '<div class="search-result">';
            html += '<div class="search-result-body">';
            html += `<a href="${result.link}"><span class="item-title">${result.title}</span></a>`;
            html += `<p class="item-excerpt">${result.excerpt}</p>`;
            html += '</div>';
            html += '<div class="search-result-side">';
            html += `<span class="content-type ${ formattedType }">${ result.type }</span>`;
            html += '</div>';
            html += '</div>';
        } );
        $('.search-results').html( '' );
        $('.search-results').html( html );
    }

    function handleSearchMeta( page, itemsPerPage, totalResults, currentContentType ) {
        $( '.search-results-pagination-info' ).css('display', 'block');
        const first = ( itemsPerPage * ( page - 1 ) ) + 1;
        const last = itemsPerPage * page < totalResults ? itemsPerPage * page : totalResults;
        $( '.search-results-pagination-info' ).html(`<span>Showing ${ first } - ${ last } of ${ totalResults } results</span>`);
        
        let options = currentContentType == 'all' ? '<option value="all" selected>All Content</option>' : '<option value="all">All Content</option>';
        for (const type in contentTypes){
            if (Object.keys(contentTypes[type].taxonomies).length > 0){
                for (const i in contentTypes[type].taxonomies){
                    for (const j in contentTypes[type].taxonomies[i].terms){
                        const val = JSON.stringify({ type: type, tax: i, term: contentTypes[type].taxonomies[i].terms[j].slug });
                        const selectedVal = val == currentContentType ? 'selected' : '';
                        options += `<option value='${ val }' ${ selectedVal }>${ contentTypes[type].taxonomies[i].terms[j].name }</option>`;
                    }
                }
            } else {
                const val = JSON.stringify({ type: type });
                const selectedVal = val == currentContentType ? 'selected' : '';
                options += `<option value='${ val }' ${ selectedVal }>${ contentTypes[type].label }</option>`;
            }
        }
        $( '.search-results-content-filter-select' ).html( options );
        $( '.search-results-content-filter' ).css('display', 'block');
    }

    function handlePaginationControls( page, itemsPerPage, totalResults ) {
        if ( itemsPerPage >= totalResults && page === 1 ) {
            $( '.search-results-pagination-controls .page-prev' ).css('display', 'none');
            $( '.search-results-pagination-controls .page-next' ).css('display', 'none');
        } else if ( page === 1 ) {
            $( '.search-results-pagination-controls .page-prev' ).css('display', 'none');
            $( '.search-results-pagination-controls .page-next' ).css('display', 'block');
            $( '.search-results-pagination-controls .page-next' ).data('page', page);
        } else if ( page * itemsPerPage >= totalResults ) {
            $( '.search-results-pagination-controls .page-prev' ).css('display', 'block');
            $( '.search-results-pagination-controls .page-prev' ).data('page', page);
            $( '.search-results-pagination-controls .page-next' ).css('display', 'none');
        } else {
            $( '.search-results-pagination-controls .page-prev' ).css('display', 'block');
            $( '.search-results-pagination-controls .page-next' ).css('display', 'block');
            $( '.search-results-pagination-controls .page-prev' ).data('page', page);
            $( '.search-results-pagination-controls .page-next' ).data('page', page);
        }
    }

    function showLoadingMessage() {
        $( '.search-results-pagination-info' ).css('display', 'none');
        $( '.search-results-content-filter' ).css('display', 'none');
        $('.search-results').html( '<div class="loading-container"><span>Loading...</span></div>' );
    }

    function showErrorMessage(msg) {
        $('.search-results').html( `<div class="error-container"><span>${msg}</span></div>` );
    }

    $( '.search-results-pagination-controls .page-prev' ).click( function() { triggerSearch( parseInt($( this ).data( 'page' )) - 1, $( '.search-results-content-filter-select' ).val() ) } );
    $( '.search-results-pagination-controls .page-next' ).click( function() { triggerSearch( parseInt($( this ).data( 'page' )) + 1, $( '.search-results-content-filter-select' ).val() ) } );
    
    $( '.search-results-content-filter-select' ).change( function() { triggerSearch(1, $(this).val() ) } );
        
    searchInput.on( 'input', debounce( () => triggerSearch(1, $( '.search-results-content-filter-select' ).val() ), 1000)).on( 'input', showLoadingMessage );

} )( jQuery );
