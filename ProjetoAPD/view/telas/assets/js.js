        $(document).ready(function () {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function () {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function () {
                            $('.fixed.menu').transition('fade out');
                        }
                    })
                ;

                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item')
                ;

            })
        ;


        // CHAT
        $(function() {
            $("#voltar").hide();
            $("#psicologos").hide();

            $('#novas_msg').click(function () {
                $("#novas_msg").hide();
                $("#voltar").fadeIn();
                $("#psicologos").fadeIn();
                $("#usuarios").hide();
            });

            $('#voltar').click(function () {
                $("#voltar").hide();
                $("#novas_msg").fadeIn();
                $("#usuarios").fadeIn();
                $("#psicologos").hide();
            });
        });
            
        function getUrlVars()
            {
                var vars = [], hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for(var i = 0; i < hashes.length; i++)
                {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            }


            window.setInterval(carrega, 1000);
            var usuario2 = '';
            function carrega(usuario2) {
                usuario2 = getUrlVars()["usuario2"];
                $.get('mensagens.php',
                    {
                        usuario2 : usuario2
                    }, function(data){
                        $('#mensagens').html(data);
                        $('#usuario2').val(usuario2);
                    });
            }