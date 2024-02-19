/*!
    * Start Bootstrap - SB Admin v7.0.4 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});

$('.view_spice').click(function(){
    var id =  $(this).attr("id");
        $('.modalBody').html(
            'Accepted dose of NPK for <strong>' + spiceRecoList[id][0] + '</strong>: <br>Nitrogen - ' + spiceRecoList[id][1] + 'kg/ha' + '<br>Phosphorus - ' + spiceRecoList[id][1] + 'kg/ha' + '<br>Potassium - ' + spiceRecoList[id][2] + 'kg/ha'
        );
    });

    $('.view_fruit').click(function(){
    var id =  $(this).attr("id");
        $('.modalBody').html(
            'Accepted dose of NPK for <strong>'+ fruitsRecoList[id][0] +'</strong>: <br>Nitrogen - ' + fruitsRecoList[id][1] + 'kg/ha' + '<br>Phosphorus - ' + fruitsRecoList[id][2] + 'kg/ha' + '<br>Potassium - ' + fruitsRecoList[id][3] + 'kg/ha'
        );
    });

    $('.view_vegtable').click(function(){
    var id =  $(this).attr("id");
        $('.modalBody').html(
            'Accepted dose of NPK for <strong>' + vegtableRecoList[id][0] + '</strong>: <br>Nitrogen - ' + vegtableRecoList[id][1] + 'kg/ha' + '<br>Phosphorus - ' + vegtableRecoList[id][2] + 'kg/ha' + '<br>Potassium - ' + vegtableRecoList[id][3] + 'kg/ha'
        );
    });


