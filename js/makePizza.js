//Is it Pizza day?
function isitPizzaDay(day, month)
{
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
    return {title:bestDate.title, date: finalDate};
}

//Generate Pizza
function generatePizza(day, month, toppings = 1)
{
    var ingredients = getToppings();
                
    var list= [];
    var msg ='';
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
                
                
    for(var i = 0; i < list.length; i++)
    {   
        if(i == (list.length -1))
        {   
            msg += 'and '+ list[i] +'.';
        }   
        if(i     == (list.length - 2))
        {   
            msg += ''+ list[i] + ' ';
        }
        else if(i != (list.length -1) && i != (list.length - 2))
        {
            msg += ''+ list[i] + ', ';  
        }
    }
    return 'Pizza with ' + msg + '';
}

//get toppings
function getToppings()
{
    return [
        "pepperoni", 
        "sausage", 
        "onions", 
        "ham" ,
        "green peppers", 
        "mushrooms", 
        "black olives", 
        "red peppers", 
        "anchovies", 
        "extra cheese",
        "beans",
        "pinneaple",
        "spinach",
        "jalapeño peppers",
        "broccoli"
    ];
                
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
    var target = new Date('05/1/2017');
    var date = new Date(target.getFullYear(), target.getMonth(), 6);
    return date.getDate(); 
}
