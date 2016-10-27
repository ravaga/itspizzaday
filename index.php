<?php ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>It's Pizza Day</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
            body
            {
                background: #eee;
            }
        </style>
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
                        <a href="https://en.wikipedia.org/wiki/List_of_food_days"><small>Source wiki</small> </a>
                        <br/>
                        <br/>
                        <button id="rollAgain" class="btn btn-primary">Roll again</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container text-center">
                    
                </div>
            </div>
        </div>
    </body>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script>        
        $(document).ready(function(){
            var today = new Date();
            var month = today.getMonth() + 1;
            var day = today.getDate();
            var nextDate = nextPizzaDay(today);
            
            
            $('.today').append(today.toDateString());
            
            $('.result').append(isitPizzaDay(day, month));
            
            $('.nextInLine').append('Next pizza day is: <br/>"'+ nextDate.title + '" which is on: ' + nextDate.date + '');
            
            $('#rollAgain').on('click', function(e){
                e.preventDefault();
                $('.result').html(' ');
                $('.result').append(generatePizza(day, month, 4));
                
            })
            
            
        });
        
        //Is it Pizza day?
        function isitPizzaDay(day, month)
        {
            console.log(month);
            var validDates = getValidDates();
            var title = '';
            var flag = false;
            validDates.forEach(function(i){
                if(i.date.month == month && i.date.day == day)
                {
                    flag = true;
                    title = i.title;
                }
            });
            if(flag != true)
            {
                title = generatePizza(day, month, 3);
            }
            return title;
        }
        
        //next pizza day
        function nextPizzaDay(today)
        {
            var dates = getValidDates();
            var current_diff, bestDate;
            var best_diff = -(new Date(0,0,0)).valueOf();
            var finalDate;
            for(var i = 0; i < dates.length; i++)
            {
                var date = new Date(''+dates[i].date.month +'/' + dates[i].date.day +'/'+ dates[i].date.year + '');
                current_diff = date - today;
                if(current_diff < best_diff)
                {
                    best_diff = current_diff;
                    bestDate = dates[i];
                    finalDate = date;
                }
            }
            return {title:bestDate.title, date: finalDate.toDateString()};
        }
        
        //Generate Pizza
        function generatePizza(day, month, toppings = 1)
        {
            var ingredients = [
                "pepperoni", "sausage", "onions", "ham" ,"green peppers", "mushrooms", "black olives", "red peppers", "anchovies", "extra cheese", "extra pepperoni"];
            
            var list= [];
            function randomItem(toppings, ingredients, list)
            {
                item = ingredients[Math.floor(Math.random()*ingredients.length)]
                if(list.indexOf(item) > -1){
                    randomItem(toppings, ingredients, list);
                }
                else{
                    list.push(item);
                }
                if(list.length == toppings)
                {
                    return list;
                }
                else{ 
                    randomItem(toppings, ingredients, list); 
                }
                
                return list;
            }
            randomItem(toppings, ingredients, list);
            
            return 'Pizza with ' + list[0] + ', ' + list[1] + ' and ' + list[2] + '';
        }
        
        //Get Valid dates
        function getValidDates()
        {
            var validDates = [
                {
                    title: 'National Pizza Day', 
                    date: {
                        day: 9,
                        month: 2,
                        year:2017
                    }, 
                },
                {
                    title: 'National Pizza Party Day',
                    date:{
                        day: firstFridayOfMay(),
                        month: 5,
                        year:2017
                        
                    }
                },
                {
                    title: 'National Cheese Pizza Day',
                    date: {
                        day:5,
                        month:9,
                        year:2017
                    }
                },
                {
                    title:'National Pepperoni Pizza Day',
                    date:{
                        day: 20,
                        month: 9,
                        year:2017
                    }
                },
                {
                    title: 'National Sausage Pizza Day',
                    date:{
                        day:11,
                        month: 10,
                        year:2017
                    }
                },
                {
                    title: 'National Pizza with the Works Except Anchovies Day',
                    date:{
                        day: 12,
                        month: 11,
                        year:2016
                    }
                }
            ];
            
            return validDates;
        }
        
        //first friday of may
         function firstFridayOfMay()
        {
            var target = new Date('05/1/2016');
            var date = new Date(target.getFullYear(), target.getMonth(), 6);
            console.log(date.getDate());
            return date.getDate(); 
        }
        
        
    </script>
</html>