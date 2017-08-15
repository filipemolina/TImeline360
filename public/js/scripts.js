//////////////////// Funções Principais

var helper = {

    // Como usuar no html:
    // helper.showSwal(tipo, titulo)

    showSwal: function(tipo, titulo) {
        
        if(tipo == 'basico'){
            swal({
                title: titulo,
                buttonsStyling: false,
                confirmButtonClass: "btn btn-roxo"
            });
        } else if (tipo == 'info'){
            swal({
                title: titulo,
                type: 'info',
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info"
            });

        } 
    }



};


$(function(){
    VMasker ($("#cpf")).maskPattern("999.999.999-99");
    VMasker ($(".datepicker")).maskPattern("99/99/9999");

    $(".helper-apoio").click(function(){

        helper.showSwal('info','Efetue o login para apoiar a publicação')

    })

    // Deslizar comentários
    $('.slide-coment').click(function(){
        event.preventDefault();
        $(this).parent().parent().parent().find('.colapso').slideToggle();
    });

    
    // Alterar cor do botão apoiar
    $('.apoiar').click(function(){
        event.preventDefault();
        if ($(this).hasClass('btn-primary')){
            $(this).removeClass('btn-primary')
        } else {
            $(this).addClass('btn-primary')
        }
    })

    // Remover classe card-hidden
    $().ready(function() {
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

    // Adicionar efeito de rotação ao ícone do objeto
-
-   $('.rodar-icone')
        
        .click(function(){
            var isto = this;
            
            if($(isto).find('i').hasClass('animated girar-rev')) {
                $(isto).find('i').removeClass('girar-rev').addClass('girar')
            } else if ($(isto).find('i').hasClass('animated girar')) {
                $(isto).find('i').removeClass('girar').addClass('girar-rev')
            }else {
                $(isto).find('i').addClass('animated girar')
            }
        })
        
        // .mouseout(function(){
        //     $(this).find('i').removeClass('animated girar')
        // });

    //////////////////////////////////// Mapa

    // var mapData = {
    //     "AU": 760,
    //     "BR": 550,
    //     "CA": 120,
    //     "DE": 1300,
    //     "FR": 540,
    //     "GB": 690,
    //     "GE": 200,
    //     "IN": 200,
    //     "RO": 600,
    //     "RU": 300,
    //     "US": 2920,
    // };

    // $('#worldMap').vectorMap({
    //     map: 'world_mill_en',
    //     backgroundColor: "transparent",
    //     zoomOnScroll: false,
    //     regionStyle: {
    //         initial: {
    //             fill: '#e4e4e4',
    //             "fill-opacity": 0.9,
    //             stroke: 'none',
    //             "stroke-width": 0,
    //             "stroke-opacity": 0
    //         }
    //     },

    //     series: {
    //         regions: [{
    //             values: mapData,
    //             scale: ["#AAAAAA","#444444"],
    //             normalizeFunction: 'polynomial'
    //         }]
    //     },
    // });

    //////////////////////////////////////////////////////////////////////////////// Gráficos

    //////////////////////////////////////////////////// Daily Sales

    // dataDailySalesChart = {
    //     labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
    //     series: [
    //         [12, 17, 7, 17, 23, 18, 38]
    //     ]
    // };

    // optionsDailySalesChart = {
    //     lineSmooth: Chartist.Interpolation.cardinal({
    //         tension: 0
    //     }),
    //     low: 0,
    //     high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
    //     chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
    // }

    // var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

    // var animationHeaderChart = new Chartist.Line('#websiteViewsChart', dataDailySalesChart, optionsDailySalesChart);

    // md.startAnimationForLineChart(dailySalesChart);

    //////////////////////////////////////////////////// Website Views

    // var dataWebsiteViewsChart = {
    //   labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
    //   series: [
    //     [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]

    //   ]
    // };
    // var optionsWebsiteViewsChart = {
    //     axisX: {
    //         showGrid: false
    //     },
    //     low: 0,
    //     high: 1000,
    //     chartPadding: { top: 0, right: 5, bottom: 0, left: 0}
    // };
    // var responsiveOptions = [
    //   ['screen and (max-width: 640px)', {
    //     seriesBarDistance: 5,
    //     axisX: {
    //       labelInterpolationFnc: function (value) {
    //         return value[0];
    //       }
    //     }
    //   }]
    // ];
    // var websiteViewsChart = Chartist.Bar('#websiteViewsChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);

    //start animation for the Emails Subscription Chart
    // md.startAnimationForBarChart(websiteViewsChart);

    //////////////////////////////////////////////////// Completed Tasks

    // dataCompletedTasksChart = {
    //     labels: ['12p', '3p', '6p', '9p', '12p', '3a', '6a', '9a'],
    //     series: [
    //         [230, 750, 450, 300, 280, 240, 200, 190]
    //     ]
    // };

    // optionsCompletedTasksChart = {
    //     lineSmooth: Chartist.Interpolation.cardinal({
    //         tension: 0
    //     }),
    //     low: 0,
    //     high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
    //     chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
    // }

    // var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

    // start animation for the Completed Tasks Chart - Line Chart
    // md.startAnimationForLineChart(completedTasksChart);

   

});