<?php?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>It's Pizza Day</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            body
            {
                background: #eee;
            }
        </style>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-86407807-1', 'auto');
          ga('send', 'pageview');
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row" style="padding-top:50px">
                <div class="col-sm-6 col-sm-offset-3 jumbotron">
                    <div class="text-center">
                        <small class="today"></small>
                        <p>Today's pizza is:</p>
                        <h2 class="result"></h2>
                        <small class="nextInLine">
                        
                        </small>
                        <a href="https://en.wikipedia.org/wiki/List_of_food_days" target="_blank"><small>Source wiki</small> </a>
                        <br/>
                        <br/>
                        <form class="form text-center">
                            <label>Number of toppings</label>
                            <div class="form-group row">
                                
                                <div class="col-sm-2 col-sm-offset-5">
                                    <select class="form-control toppings">
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <button id="rollAgain" class="btn btn-primary" type="submit">
                                    Roll Again
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container text-center">
                    <a href="https://github.com/ravaga/itspizzaday" target="_blank"><i class="fa fa-github fa-2x"></i><br/>github</a>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/e4655edeee.js"></script>
    <script src="js/makePizza.js"></script>
    <script>        
        $(document).ready(function(){
            var today = new Date();
            var month = today.getMonth() + 1;
            var day = today.getDate();
            var nextDate = nextPizzaDay(today);
            
            
            $('.today').append(today.toDateString());
            $('.result').append(isitPizzaDay(day, month));
            $('.nextInLine').append('Next officical pizza day is: <br/>"'+ nextDate.title + '" which is on: ' + nextDate.date.toDateString() + '');
            
            $('.toppings').append(getToppingsAsOptions()); 
            
            $('#rollAgain').on('click', function(e){
                e.preventDefault();
                var tops = $('.toppings').val();
                $('.result').html(' ');
                $('.result').append(generatePizza(day, month, tops));
                
            })
            
        });
        
    </script>
    
</html>