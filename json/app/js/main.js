$( document ).ready( function () {

  function allData() {

    $.getJSON( "./menu.json", data => {

      let menu = data.menu;
      $.each( menu, function ( i, m ) {
        $( '.menu' ).append( /*html*/ `
          <div class="col-lg-3 mr-3 mb-3">
            <div class="card">
              <img src="./img/${ m.gambar }" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">${ m.nama }</h5>
                <p class="card-text">${ m.deskripsi }</p>
                <h5 class="card-title">Rp. ${ m.harga },-</h5>
                <a href="#" class="btn btn-primary">Order Now</a>
              </div>
            </div>
          </div> `);
      } );
    } );
  }

  allData();

  $( '.nav-link' ).click( function () {

    $( '.nav-link' ).removeClass( 'active' );
    $( this ).addClass( 'active' );

    let = label = $( this ).html()
    $( '.label' ).html( label );

    $( '.menu' ).html( '' );

    if ( label == 'All Menu' ) {

      $( '.menu' ).html( allData() );

      return;
    }

    $.getJSON( './menu.json', category => {

      let categoryMenu = category.menu;
      let menuData = ' ';

      $.each( categoryMenu, function ( i, m ) {

        if ( m.kategori == label.toLowerCase() ) {
          menuData += /*html*/ `
            <div class="col-lg-3 mr-3 mb-3">
              <div class="card">
                <img src="./img/${ m.gambar }" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">${ m.nama }</h5>
                  <p class="card-text">${ m.deskripsi }</p>
                  <h5 class="card-title">Rp. ${ m.harga },-</h5>
                  <a href="#" class="btn btn-primary">Order Now</a>
                </div>
              </div>
            </div> `;
        }
      } );

      $( '.menu' ).html( menuData );

    } );
  } );

} );