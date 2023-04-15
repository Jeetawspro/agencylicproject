jQuery( document ).ready(function() {
   jQuery(".bbc-star1").focus(); 

});


jQuery(function(){
   
  jQuery(".bcc-star1").change(function(){
      getBirthChartCompatibility();
  });

  jQuery(".bcc-star2").change(function(){
      getBirthChartCompatibility();
  });


});


function getBirthChartCompatibility() {
  
  var star1Value = jQuery(".bcc-star1").val();
  var star2Value = jQuery(".bcc-star2").val();

  var star1Sign = "";
  var star2Sign = "";

  var starMsg = "";
  var errorMsg = "<br>Please select the following:";
  var count = 0;		
  
  star1Sign = getStarSign(star1Value);
  if (star1Sign == "INVALID") {
     errorMsg=errorMsg +"<br>The first star sign";
     count++;		
  } 

  star2Sign = getStarSign(star2Value);
  if (star2Sign == "INVALID") {
      errorMsg=errorMsg +"<br>The second star sign";
      count++;    
  }

 
  if (star1Sign != "INVALID" && star2Sign !== "INVALID") {

      starMsg = "<span class='bcc-center'>" + star1Sign + "-" + star2Sign + " Compatibility</span><br>"; 
         
      starMsg = starMsg + getBirthChartCompatibilityMsg(star1Sign, star2Sign);

      jQuery(".bcc-starMsg").empty().append(starMsg);

 }
           
 /*
 if(count > 0){
    jQuery(".bcc-starMsg").empty().append(errorMsg + "</p>");
 } */  

 /* jQuery(".bcc-starMsg").hide(0).delay(4).fadeIn(1000); */
    
 }

function getStarSign(star) {
   
    var starSign = "";

    switch(star) {
    
    case "01":
        starSign = "Aries";
        break;
    case "02":
        starSign = "Taurus";
        break;
    case "03":
        starSign = "Gemini";
        break;
    case "04":
        starSign = "Cancer";
        break;
    case "05":
        starSign = "Leo";
        break;
    case "06":
        starSign = "Virgo";
        break;
    case "07":
        starSign = "Libra";
        break;
    case "08":
        starSign = "Scorpio";
        break;
    case "09":
        starSign = "Sagittarius";
        break;
    case "10":
        starSign = "Capricorn";
        break;
    case "11":
        starSign = "Aquarius";
        break;
    case "12":
        starSign = "Pisces";
        break;
    default:
       starSign = "INVALID";
       break; 

   }
   
   return starSign;

}

function getBirthChartCompatibilityMsg(star1Sign, star2Sign){

    var starMsg = "";
    
    switch(star1Sign) {

      case "Aries":

        if (star2Sign == "Aries") {
           starMsg = getAriesAriesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getAriesTaurusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getAriesGeminiCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getAriesCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getAriesLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getAriesVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getAriesLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getAriesScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getAriesSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getAriesCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getAriesAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getAriesPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;
    
    case "Taurus":

        if (star2Sign == "Aries") {
           starMsg = getAriesTaurusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusTaurusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getTaurusGeminiCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getTaurusCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getTaurusLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getTaurusVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getTaurusLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getTaurusScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getTaurusSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getTaurusCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getTaurusAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getTaurusPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;

    case "Gemini":
        
        if (star2Sign == "Aries") {
           starMsg = getAriesGeminiCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusGeminiCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiGeminiCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getGeminiCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getGeminiLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getGeminiVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getGeminiLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getGeminiScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getGeminiSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getGeminiCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getGeminiAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getGeminiPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;

    case "Cancer":
            
        if (star2Sign == "Aries") {
           starMsg = getAriesCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerCancerCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getCancerLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getCancerVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getCancerLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getCancerScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getCancerSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getCancerCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getCancerAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getCancerPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;

    case "Leo":
        
        if (star2Sign == "Aries") {
           starMsg = getAriesLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoLeoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getLeoVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLeoLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getLeoScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getLeoSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getLeoCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getLeoAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getLeoPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;
    
    case "Virgo":
   
        if (star2Sign == "Aries") {
           starMsg = getAriesVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoVirgoCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getVirgoLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getVirgoScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getVirgoSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getVirgoCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getVirgoAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getVirgoPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;
    case "Libra":

        if (star2Sign == "Aries") {
           starMsg = getAriesLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGemminiLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoLibrCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLibraLibraCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getLibraScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getLibraSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getLibraCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getLibraAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getLibraPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;
   
    case "Scorpio":

        if (star2Sign == "Aries") {
           starMsg = getAriesScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLibraScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getScorpioScorpioCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getScorpioSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getScorpioCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getScorpioAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getScorpioPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;

    case "Sagittarius":
    
        if (star2Sign == "Aries") {
           starMsg = getAriesSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLibraSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getScorpioSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getSagittariusSagittariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getSagittariusCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getSagittariusAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getSagittariusPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;

    case "Capricorn":

        if (star2Sign == "Aries") {
           starMsg = getAriesCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLibraCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getScorpioCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getSagittariusCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getCapricornCapricornCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getCapricornAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getCapricornPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };
        break;

    case "Aquarius":
         
        if (star2Sign == "Aries") {
           starMsg = getAriesAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLibraAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getScorpioAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getSagittariusAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getCapricornAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getAquariusAquariusCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getAquariusPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;

    case "Pisces":
       
        if (star2Sign == "Aries") {
           starMsg = getAriesPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Taurus") {
           starMsg = getTaurusPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Gemini") {
           starMsg = getGeminiPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Cancer") {
           starMsg = getCancerPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Leo") {
           starMsg = getLeoPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Virgo") {
           starMsg = getVirgoPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Libra") {
           starMsg = getLibraPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Scorpio") {
           starMsg = getScorpioPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Sagittarius") {
           starMsg = getSagittariusPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Capricorn") {
           starMsg = getCapricornPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Aquarius") {
           starMsg = getAquariusPiscesCompatibility(star1Sign, star2Sign);
        }
        else if (star2Sign == "Pisces") {
           starMsg = getPiscesPiscesCompatibility(star1Sign, star2Sign);
        }
        else {
          starMsg = "The zodiac compatibility could not be established ...";
        };

        break;
 
    default:
 
       star1Sign = "INVALID";

       break; 

   }

   return starMsg;

}


function getStarCompatibilityMsg(starSign){

    var starMsg = "";
    
    switch(starSign) {

      case "Aries":
           starMsg = "<strong>Aries</strong> is symbolized by the Ram, is the Sign of self and is ruled by Mars (Passion). They are the trailblazers of the Zodiac who are pioneering, bold, brash and fiery. They seek social identity and a strong partner who understands them and can have many short, fast-paced, exciting and passionate affairs. ";
           break;
      case "Taurus":
           starMsg = "<strong>Taurus</strong> is symbolized by the Bull and is ruled by Venus (Love & Beauty) and are the anchors of the Zodiac who are amicable, grounded, stubborn and trustworthy.  Taurus seeks intimacy, dependability and security in a relationship and dislike nagging partners or anything cheap or fake. ";
           break;
      case "Gemini":
           starMsg = "<strong>Gemini</strong> is symbolised by the Twins, is the Sign of partnership is ruled by Mercury (Communication) and are the chameleons of the Zodiac who are diplomatic, quick-witted, flexible and intellectually curious. Gemini seek spontaneity, change, and excitement in a relationship and are attracted to partners that are adventurous, free-spirited, and have a wild or eccentric streak. Gemini is the Sign most likely to stray as they get bored easily. ";
           break;
      case "Cancer":
           starMsg = "<strong>Cancer</strong> is symbolised by the Crab, is the Sign of the home and is ruled by the Moon (Emotion) and are the mothers of the Zodiac who are introverted, nurturing, empathetic and highly intuitive– they make excellent parents. Cancers love to be adored and crave commitment in a relationship. ";
           break;
      case "Leo":
           starMsg = "<strong>Leo</strong> is symbolized by the Lion and is ruled by the Sun (Self) and are the natural leaders of the Zodiac who are noble, courageous, fiery and determined. Leo’s seek someone who is adventurous and spicy who they can love and trust for a lifetime in a relationship. ";
           break;
      case "Virgo":
           starMsg = "<strong>Virgo</strong> is symbolised by a Virgin and is ruled by Mercury (Communication) and are introverted, grounded, flexible and detail orientated with a logical and systematic approach to life. Conservative by nature and cautious with their hearts, Virgos prefer old-fashioned traditional courtship, appreciate honesty and openness in a relationship and are looking for long term love. ";
           break;
      case "Libra":
           starMsg = "<strong>Libra</strong> is symbolised by the Scales, is the Sign of partnership and is ruled by Venus (Love & Beauty) and are the social butterflies of the Zodiac concerned with beauty, art and balance in life and relationships. They fall in love easily and are most attracted to confident, independent, well-dressed, sociable, articulate people who are open about their emotions and can hold their attention but not in dramatic way. ";
           break;
      case "Scorpio":
           starMsg = "<strong>Scorpio</strong> is symbolised by a Scorpion, is co-ruled by Pluto (Power) and Mars (Passion) and are determined, courageous, jealous and secretive. Scorpios passionate, mysterious nature makes them all the more attractive to many prospective partners. They crave security and take intimacy and closeness seriously as they do not trust many people and are attracted to intelligent and honest partners who can keep them interested and intrigued. ";
           break;
      case "Sagittarius":
           starMsg = "<strong>Sagittarius</strong> is symbolised a half horse and man archer, is ruled by Jupiter (Luck) and are the wanderers of the Zodiac who are adventurous, extraverted, fiery and easy-going. Sagittarius enjoys a challenge and especially are attracted to confident outgoing partners. They need a lot of freedom and a sense of purpose in a relationship. ";
           break;
      case "Capricorn":
           starMsg = "<strong>Capricorn</strong> is symbolised by a sea goat and is ruled by Saturn (Karma) and are the fathers of the Zodiac who are conservative, grounded, reliable and trustworthy.  Choosing a mate is a serious consideration for Capricorns. Once they’ve invested time and effort in a relationship they feel morally compelled to stick with it and are less likely to break up quickly when the going gets tough. ";
           break;
      case "Aquarius":
           starMsg = "<strong>Aquarius</strong> is symbolised by the water bearer and is ruled by Saturn (Karma) and Uranus (Rebellion) and are the ground breaking revolutionaries of the Zodiac who are freedom loving, determined, quirky idealists. Most Aquarians want to be friends first before becoming lovers. Aquarians love good intellectual discussions – expect many long talks and a slow easing into a partnership. ";
           break;
      case "Pisces":
           starMsg = "<strong>Pisces</strong> is co-ruled by Jupiter (Luck) and Neptune (Illusion) and are dreamy, intuitive, creative, laid back and gentle souls. They are also sensual and emotional, empathetic and altruistic and prefer a simplistic way of life. Looks are secondary for Pisces who want a partner who is attracted to them not only physically but also to their minds and spirits with whom they can form a deep emotional bond. Pisces will understand your emotional ups and downs and will love you even more for sharing your intense feelings with them. ";
           break;
      default:
           starMsg = "INVALID";
           break; 
    }

    return starMsg;

}


function getAriesAriesCompatibility(star1Sign, star2Sign){

   var starMsg = "";

   starMsg= "<p><strong>Aries</strong> is symbolized by the Ram, is the Sign of self and is ruled by Mars (Passion). They are the trailblazers of the Zodiac who are pioneering, bold, brash and fiery. They seek social identity and a strong partner who understands them and can have many short, fast-paced, exciting and passionate affairs. Usually Aries prefer self-sufficient mates without complicated emotional needs. They hate being dictated to whether personal or professional and would rather issue orders than follow them. Most Aries crave compliments therefore to win Aries over, show appreciation of their boldness and express admiration for their skills.<br><br><strong>Aries-Aries</strong> is an exciting, spontaneous and very compatible relationship - they always keeps things new and never get bored. Their relationship is a dynamic one, like having two alphas in a pack.  It is a meeting of two strong spirits, therefore there is bound to be fireworks - Aries is a Fire Sign! Both are positive and enthusiastic and love to try out new things - often extreme sports or some other intense activity. They play hard together and have equal stamina sharing a high energy mania that could lead to incredible momentum that sounds like a whirlwind. Aries are very straightforward and open with their feelings therefore two Aries will never have problems with hypocrisy or deceit.  Aries also has a natural generosity, so two Aries together can learn to take turns to indulge each other.</p>"; 
  
   return starMsg;

}    


function getAriesTaurusCompatibility(star1Sign, star2Sign){

   var starMsg  = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
   
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a passionate partnership. They are an excellent balance of energies; masculine and feminine, impulsive and deliberate. Their contrasting personalities and ability to learn from one another makes Aries-Taurus a mutually giving and satisfying relationship. Aries sees Taurus as their rock; Taurus offers security, romance and long-term vision in work and play and can help Aries rein in some of their more foolish, impractical impulses.  Aries brings excitement to the table and can help Taurus be more spontaneous and adventurous and try new things.</p>";
     
   return starMsg;

}    

function getAriesGeminiCompatibility(star1Sign, star2Sign){
  
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> work very well together as a single unit. They match beautifully, connecting on a physical as well as an intellectual level and have a deep understanding and appreciation of one another. Together they can learn much more than either Sign would alone. Both Signs are optimistic and energetic and have common goals and a wide range of interests. They create a good balance together: Gemini is a thinker and a talker who prizes intellectual stimulation and freedom, looks at all sides of an argument and wants to discuss things. Aries, however, wants to experience them and initiates new plans; sports, travel or an exciting date idea and Gemini has the energy to keep up with Aries’s fast pace and wild ideas.</p>";
        
   return starMsg;

}    

function getAriesCancerCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>An <strong> " + star1Sign + "-" + star2Sign + "</strong> combination is a case of opposites attracting. A great dynamic between Aries-Cancer is both Signs are extremely protective of those they love. When trouble is near, Cancer uses that Crab shell to protect their family and mate, whilst the Ram uses their bravery and strength like a knight in shining armour.  Aries can teach Cancer to come out of their shell and Cancer can help Aries to be gentle and slow down.</p>"
          + "<p>Aries is a Fire Sign and Cancer a Water Sign which can be a great combination if they work together, using both emotion and action to get things done. Aries is out there on the front end whilst Cancer is quietly supporting behind the scenes on the back-end helping Aries get as far as they want in life. Each partner’s ability to provide what the other is lacking makes theirs an equal relationship. As Aries and Cancer are both Cardinal Signs, they are both initiators who need to learn how to co-operate; although on the surface Aries appears to be the leader, who rushes in to meet a challenge, Cancer is also indirectly in charge through emotional control and the ability to weigh up situations.</p>";
        
  return starMsg;

}    

function getAriesLeoCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a highly compatible and powerful match. Their mutual energy and passion makes this an exciting and dynamic relationship. Both partners are loyal, care about each other deeply and have genuine admiration and respect for one another. Aries will need to show respect too otherwise Leo can be resentful.  Both are masculine energy archetypes, and make a good combination - they understand one other as both are coming from the same place.</p>"
          + "<p>Aries being a Cardinal Sign, are leaders who initiate projects and motivate others and Leo, being a Fixed Sign, the one who follows through in this partnership. Leo also fixates and easily fall in love long term and are very loyal - when Leo declares their love, there is little Aries can do to change their mind. Both Signs, however, want to be the leader in this relationship therefore compromise is essential. Both are also Fire Signs which makes their relationship very heated and passionate.</p>";
        
   return starMsg;

}    


function getAriesVirgoCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> combination is the essence of opposite personalities attracting who have nothing in common, making it a highly complementary relationship that takes time to develop that can teach Aries and Virgo much over the long haul. Aries admires and appreciates Virgos work ethic and this is a beneficial dynamic if these two Signs are working as a team toward a common goal.</p>"
          + "<p>Aries being a Fire Sign is fiery impetuosity whilst Virgo being an Earth Sign is grounded practicality. Virgo likes to take things slow and weigh up all the options before they invest in a relationship unlike Aries who wants to dive straight in – Aries will need to keep that in mind if they decided they want Virgo.  Aries as a Cardinal Sign, is the boss in this relationship who initiates ideas and Virgo, being a Mutable Sign, is versatile and adaptable and happy being in the background and to follow Aries suggestions once they decide they are viable.</p>";
        
   return starMsg;

}    


function getAriesLibraCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> have a harmonious relationship which is great learning experience for both Signs. Aries and Libra are 180 degrees part on the Zodiac which makes them opposite polarities thus skilled at creating balance in the union. Mars and Venus are the same sides of the relationship coin, as well as a balance of masculine and feminine energy. Each brings to the relationship table qualities the other lacks: Charming, cultured Libra can teach brash Aries about style; Aries is very decisive and can teach indecisive Libra how to rely on intuition for solutions; Aries is the Sign of self while Libra is the Sign of partnership … and so the differences continue.</p>"
          + "<p>With the Fire Sign of Aries combined with the Air Sign of Libra, we have wind moving Fire creating abundant sparks with passionate chemistry. Both Signs also have wide-ranging interests, and at the end of a long day, Aries can come home with interesting stories to tell cerebral Libra.  As Aries and Gemini are both Cardinal Signs, therefore natural born leaders, both want to be the boss in the relationship therefore compromise is essential.</p>";
  
   return starMsg;

}    


function getAriesScorpioCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> have a powerful relationship when they combine their forces. When the relationship unfolds, both can be left wondering how they ever managed life apart. Both are winners who never give up or settle for second best and who love power - Aries is the initiator of power and Scorpio the receiver, therefore this is a very passionate and balanced match although Scorpio has a more complex and deeper devotion to the relationship than Aries. This pair and can achieve almost anything as long as they learn to share the spotlight and give each other the room they need to grow.</p>";
      
   return starMsg;

}    


function getAriesSagittariusCompatibility(star1Sign, star2Sign){
 
  var starMsg = "";
  var star1Msg = getStarCompatibilityMsg (star1Sign);
  var star2Msg = getStarCompatibilityMsg (star2Sign);
 
  starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are highly compatible as friends and as partners. Both have masculine energy therefore look at the world in a similar way and share common interests and similar personalities. Both also have a tendency to be the explorers and pioneers of the Zodiac are well matched in their energy, drive and enthusiasm and understand one another’s optimistic view of life.  </p>"
          + "<p>Aries and Sagittarius are both Fire Signs which mean intense passion, energy and sparks between them. These Signs seldom disagree as Aries, being a Cardinal Fire Sign, is the initiator and leader and Sagittarius, being a Mutable Fire Sign, is flexible and adaptable. There are no power struggles between them as Aries likes to have the glory in the limelight and Sagittarius is happy to control things from behind the scenes.</p>";
    
  return starMsg;

}    
 

function getAriesCapricornCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> brings unique qualities to the union which they can teach each other that they would not learn otherwise on their own. Although this is a challenging relationship, most obstacles can be overcome with good will and communication as can any relationship based in mutual love and respect. Both are very stubborn and think their way is best and need to understand the key to success is compromise, and sometimes they have to agree to disagree.</p>"
          + "<p>Aries and Capricorn as Cardinal Signs are both initiators, natural born leaders and decision makers in their own unique way - they just go about it in completely different ways. Aries, being a Fire Sign, is dynamic and Capricorn, being an Earth Sign, is grounded and practical. Aries looks for short-cuts and will impetuously and passionately pursue thing or someone without thinking if it’s right for them. Capricorn’s approach, on the other hand, wants to follow the rules assuming they are tried and tested paths to success. They analyse, and strategizing about how much something or someone will benefit them before taking action. In the long term, Earth and Fire balance can create a practical and responsible, but exciting and spontaneous relationship. Capricorn is indirectly in charge although on the surface Aries is the leader rushing in to get things going.</p>";
 
   return starMsg;

}    
       

function getAriesAquariusCompatibility(star1Sign, star2Sign){
  
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>" 
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong>  relationship is an exciting combination of Aquarius vision and Aries action making them a highly creative pair. The foundation of their relationships is friendship and good communication. There is a special lasting bond between this pair – they share a unique understanding of one another’s idealistic, enthusiastic outlook on life. They have a lot in common – both are extremely independent, spontaneous, have a wide-range of interests and crave excitement and new experiences. Although they can be competitive, they have a lot of respect and admiration for one another, which helps smooth any obstacles in their relationship.</p>";
      
   return starMsg;

}    

       
function getAriesPiscesCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg  + star2Msg + "</p>" 
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> can be a very compatible match. Both are very creative, although in other ways they seem unlikely polar opposites.  Aries tends to take on the role of protector in this union. Gentle Pisces can be so giving, understanding and empathetic they can be used as doormats, however trouble will arise Aries takes advantage of them. Aries’s directness combined with Pisces’s intuitive understanding of other people makes them a dynamic team who will always meet each other's needs, and satisfying each other's wants.</p>"
          + "<p>Aries being a Fire Sign and Pisces a Water Sign are opposite elements that can sometimes create trouble for one another – they must negotiate to ensure their balance is maintained. Aries-Pisces can learn a lot from each other: Aries can help Pisces bring their dreams and fantasies into reality through passionate action. Pisces can help Aries tone down their overt brash and rash style and teach them how to care and emphasize.</p>"
          + "<p>Aries as a Cardinal Sign, are natural leaders who initiate projects and motivate others who love the glory of the limelight. Pisces as a Mutable Sign is versatile and adaptable, happy to be in the background lending a hand when are needed - so this is a good dynamic with no power struggles over who is the boss in this union.</p>";
   
   return starMsg;

}    

function getTaurusTaurusCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);

   starMsg= "<p>Taurus is symbolized by the Bull and is ruled by Venus (Love & Beauty) and are the anchors of the Zodiac who are amicable, grounded, stubborn and trustworthy.  Taurus seeks intimacy, dependability and security in a relationship and dislike nagging partners or anything cheap or fake. Highly romantic, sensuous and loving, they enjoy the wooing process of courting and can be wooed with special outings or thoughtful gifts as they are decadent and enjoy being pampered and spoilt. They rarely rush into a relationship, but once committed, it’s solid.</p>"
          + "<p>A <strong>Taurus-Taurus</strong> relationship is based on sensuality and stability - everything Taurus loves and needs will be met another Taurus therefore this is a highly compatible combination. It can be love at first sight and their mutual love of romance and creature comforts makes theirs a highly devoted, reliable, faithful and long-lasting relationship. Taurus is an Earth Sign which is about possessions and being grounded and real - they share a love of rich, fine food and surround themselves with beautiful things such as a lovely home, expensive cars, artwork etc. In general they prefer life to be stable, steady and predictable and shy away from change. As Fixed Signs, both partners are exceptionally loyal, dedicated and committed to the union.</p>";
  
   return starMsg;

}


function getTaurusGeminiCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are not the most compatible pair, however, can give each other security; Taurus seeks intimacy and a dependable and secure partner which Gemini will offer if their needs and wants are also met as well.  Gemini appreciates Taurus sensuality and Taurus appreciates Gemini’s conversation and wit. As long as both partners communicate with each other, theirs will be a stable and happy relationship.</p>"
          + "<p>Taurus as a Fixed Earth Sign, is stubborn and practical whilst Gemini as a Mutable Air Sign, is flexible and makes decisions based on intellect or whim. This can be a difficult dynamic to navigate and both will wonder at times what they were thinking. However, as long as both are committed to the outcome, a Taurus and Gemini match has a lot to offer both individuals working out the dynamics of the relationship and how best they can get along. It requires a bit of effort and adjustment on both sides.</p>";
  
   return starMsg;

}

function getTaurusCancerCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>A <strong>" + star1Sign + "-" + star2Sign + "</strong> combination can make a stable and reliable long-term team together - both are committed to a happy home life and theirs is often the ideal long term family relationship others strive for. They have a lot in common including a mutual enjoyment of security, home and all the comforts of domestic life. Both also tend to be dependable and nurturing and prefer each other’s company rather than socialising with larger groups. Taurus is attracted to how Cancer puts everyone first. Cancer is attracted to how open, honest, real and grounded Taurus is and how Taurus brings them out of their shell and stabilises their tumultuous mood swings.  Their relationship is so solid and strong and their mutual understanding is so deep, some even say they share a karmic soul connection.</p>";
  
   return starMsg;

}


function getTaurusLeoCompatibility(star1Sign, star2Sign){
   
  var starMsg = "";
  var star1Msg = getStarCompatibilityMsg (star1Sign);
  var star2Msg = getStarCompatibilityMsg (star2Sign);
 
  starMsg= "<p>" + star1Msg + star2Msg + "</p>"
         + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> combination works well as long as they are careful to accept and understand one another. Taurus-Leo have deep mutual admiration. Both know how to stroke each other’s egos and have needs and desires the other can provide; Taurus for love and affection and Leo for the spotlight, attention, adoration and admiration. Both also love status and possessions are also extremely loyal and possessive. Taurus and Leo both being Fixed Signs, share the commitment to fulfilling their goals. Neither will dominate the other as both Signs have powerful personalities. Both love expensive luxuries – Leo is often flamboyant with gifts and Taurus loves Leo’s generosity and traditional forms of courtship. Leo's masculine energy also complements Taurus feminine energy very well.</p>";
  
  return starMsg;

}

function getTaurusVirgoCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are highly compatible as both have the same interests and desires. Both as Earth Signs are steady and practical and have integrity and common sense. They have the same work ethic and are committed to financially security and success and work hard for the creature comforts they both enjoy. Virgo is more practical than Taurus who is more sensual and beauty driven. Taurus appreciates Virgo’s quick mind and Virgo appreciates Taurus’s strength and dedication. The relationship can take a while to develop due to Virgo’s cautions nature but once established, both partners are sincere and devoted to each other long-term.</p>"
          + "<p>Taurus being a Fixed Sign is stubborn and Virgo being a Mutable Sign is flexible and can teach Taurus the value of bending when practical. Virgo likes helping Taurus achieve their goals is also very good at understanding other people is flexible enough to meet Taurus’s high standards and learn to be the romantic partner Taurus desires.</p>";
   
   return starMsg;

}


function getTaurusLibraCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
  
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> can be like a unification of two halves of a whole as if they are karmically linked. This relationship may be a slow burner as at first they may think on the surface have little in common. However, once they get to know one another, they may learn they have much more in common than was at first apparent. Both have charming personalities and look for security and desire harmony in a relationship and share a love of the arts, culture, beauty, luxury and romance – they love physical and aesthetical pleasure. Courtship is a necessary part of a romantic relationship for Libra-Taurus therefore they fit well together in this respect. They also have much to teach and learn from each another: Taurus can help Libra’s overcome their indecision and Libra can help Taurus see the different sides of a situation.</p>";
        
   return starMsg;

}


function getTaurusScorpioCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a powerful combination of masculine and feminine energy who share a strong emotional cosmic connection. They are opposite Signs of the Zodiac, giving them a complex special connection. When they combine to make a whole, each partner’s strengths can balance the other’s weaknesses - they nurture each other in complimentary ways.  Both are intensely passionate, concerned about wealth and resources and have deep desires - Taurus for possessions and Scorpio for power. Both have a deep-rooted need for security in a relationship which the other can provide and need honesty in all areas of their lives, although they pursue it in different ways, therefore their connection is real as well as sexy.</p>";
    
   return starMsg;

}


function getTaurusSagittariusCompatibility(star1Sign, star2Sign){
 
  var starMsg = "";
  var star1Msg = getStarCompatibilityMsg (star1Sign);
  var star2Msg = getStarCompatibilityMsg (star2Sign);
 
  starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are opposites with little in common, however, these two signs admire and sustain each other and can give one another new perspectives. Both have much to gain from the union as their differences and what they can learn from each other are what fuels the sparks between them. Taurus can offer Sagittarius the comforts of a secure home base whilst Sagittarius can bring fun and adventure into Taurus’s life. Taurus’s sensuality combining with the fiery sexuality of Sagittarius also means there will be a lot of sparks between this couple.</p>"
          + "<p>Taurus as a Fixed Sign is stubborn and resolute once they have made up their mind and as an Earth Sign, needs stability and tends to be sedate and practical who thrives on routine. On the other hand, Sagittarius as a Mutable Fire Sign is flexible, craves variety, needs space to move around and relies in feelings and impulse to direct them through life. These different approaches can either be complementary or a sources of stress if the two Signs cannot learn to understand and accept one another.</p>";

  return starMsg;

}


function getTaurusCapricornCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are highly compatible as they have a strong foundation of love, similar values and interests and dedication to the same goals. They have a lot in common and understand each other well. Both have high standards and are loyal, committed, and dependable. Being Earth Signs, both dislike taking risks, have down-to-earth, real authentic natures and strong work ethics as well as realistic and conservative approaches to life. They also enjoy their many material successes, and share resources well. Taurus can encourage Capricorn to relax and enjoy the fruits of their labour. Capricorn, in turn can motivate Taurus to be more disciplined to achieve their goals and make their dreams a reality. Neither are wild party goers either and enjoy quiet nights in. Although not the most exciting match with a lot of chemistry, it is fulfilling to both they can count on each other.</p>";

   return starMsg;
  
}    
       

function getTaurusAquariusCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> may at first, appear to have few common interests.  Taurus’s being an Earth Sign, has a practical, down-to-earth approach to life and has sensual interests which is opposite to Aquarius’s unconventional, modern progressive approach and, being an Air Sign, focus on intellectual connections. However, if they put their minds into figuring out how to get along and co-ordinate their efforts, they can move mountains together as both have very strong desires to succeed. Taurus and Aquarius may make better business partners instead of romantic partners.</p>";
     
   return starMsg;

}    

       
function getTaurusPiscesCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> different emotional natures complement and balance each other wonderfully. Romantically they are highly compatible and share a beautiful spiritual karmic connection that represents an idealistic heaven on earth relationship both dream of.  What keeps the bond between these two Signs strong and long-lasting is the commitment and strong foundation of empathy they value and share. Both are nurturers who value harmony and stability. Taurus is down-to-earth and practical whilst Pisces is idealistic and dreamy. So different, and yet so similar, they offer exactly what the other wants: Taurus provides the grounded approach Pisces needs to put all those dreams into action and Pisces offers Taurus kindness, gentleness and empathy. Pisces is flattered by Taurus possessiveness and appreciates Taurus’s loyalty and down-to-earth nature who in turn loves the dreamy fantasy side of Pisces.</p>";

   return starMsg;

}    


function getGeminiGeminiCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>Gemini is symbolised by the Twins, is the Sign of partnership is ruled by Mercury (Communication) and are the chameleons of the Zodiac who are sociable, diplomatic, quick-witted, good listeners and conversationalists. As Mutable Air Signs, Gemini’s go with the flow quickly moving from one thing, person or idea to the next according to impulse and are versatile and adaptable who makes decisions based on intellect or whim.</p>"
          + "<p>Gemini seeks spontaneity, change, and excitement in a relationship and are attracted to partners that are adventurous, free-spirited and have a wild or eccentric streak. Gemini is the Sign most likely to stray as they get bored easily. Their relationships tend to be conflict-free as they are easy-going have mastered the art of compromise. Gemini tend to make friends very easily and find dating equally painless – what is important to them is love.</p>"
          + "<p>A <strong>Gemini-Gemini</strong> combination is like four people coming together as the Sign is represented by twins. Their relationship is exciting and intellectually stimulating and their flexible, easy-going natures make the four of them a perfect couple! Highly compatible romantically, this relationship is never dull as both have the gift of the gab and will be life and soul of the party with their wit and well-honed entertainment routine. This couple are easy to talk to, smart, quick witted and love chatting therefore have each other as sounding boards to bounce new ideas and theories.  Both understand each other’s need for freedom and having a partner who is up for the next adventure will appeal to both as Gemini gets bored easily. Together, it they can accomplish more than either could alone.</p>";

   return starMsg;

}


function getGeminiCancerCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg=  "<p>" + star1Msg + star2Msg + "</p>"
           + "<p>Gemini and Cancer approach the world in such different ways, it may seem on the surface they have nothing in common and cannot agree on anything. Cancer is a home body whilst Gemini is a thinker and enjoys fun nights out on the town, and so the differences continue. However, their relationship can work once Gemini-Cancer learn to understand and accept their differences, co-operate and work together as a team. Each partner has the ability to provide what the other is lacking - Gemini thinks ahead and Cancer quietly supports those ideas behind the scenes. Gemini's silver tongue and knight in shining armour chivalrous nature may encourage Cancer to come out of its shell. Cancer, in turn, can teach Gemini to slow down and appreciate life instead of rushing on to the next thing.</p>";
       
   return starMsg;      

}


function getGeminiLeoCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> have a youthful energy and optimistic explorative natures and view of the world and are highly compatible. Their relationship is playful and high-spirited, characterized by optimism and high energy – both are always looking for fun new adventures and are as passionate as they are chatty.  Gemini, who thrives on mental stimulation, is very attracted to creative, dramatic spirited Leo. Decisive, direct Leo can help Gemini make a decision if they are unable to make up their mind due to their ability to see and weigh up all options. Leo as a Fire Sign and Gemini is an Air Sign is a great combination as Air fuels Fire - Gemini can help Leo realize their full potential. Leo is a great leader and as a Fixed Sign is stubborn and resolute whilst Gemini, being a Mutable Sign, is extremely flexible, happy to be in the background whilst Leo takes the spotlight and the glory.</p>";

   return starMsg;

}


function getGeminiVirgoCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>Gemini and Virgos approaches to life are so different that mutual acceptance can be difficult. However, as long as they use their joint Mercury powers of communication, and embrace each other’s strengths, their relationship can be a gratifying one. Both love to travel and want the same things and can give each other security. They can also learn much from each another; Gemini can help bring fun and excitement into Virgo’s life who in turn brings a keep it real down to earth attitude to the relationship. Both are Mutable Signs which is the couple’s greatest strength as it makes for a very flexible relationship that can last long term. Gemini is masculine energy and Virgo a feminine one so paring their Mutable energy in this way can create a beautiful union.</p>";

   return starMsg;

}


function getGeminiLibraCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> combine very well together and are very compatible. Love and communication are the markers of this partnership as well as harmony and balance. Both have a wide range of interests and as Air Signs make a good intellectual team who can expose each other to new and different interests and viewpoints. Both also share a need for intellectual freedom, which they can provide one another. Libra, being a Cardinal Sign, likes to be the leader in a relationship and also tends to initiating new idea, project or other pursuits. Flexible Gemini, being a Mutable Sign, has the get-up-and-go needed to put Libras ideas into action. However, both have a tough time bringing things to closure and fruition. Libra is a feminine energy and Gemini a masculine one, so they also balance each well in this respect.</p>";
    
   return starMsg;

}


function getGeminiScorpioCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> relationship tends to be a highly passionate one often characterised by arguments. They are strong when they function together as a unit. Both want the same things but often just have different ways of going about it. Communication is important to both and is also a strong point that can help the relationship last the test of time. Scorpio is a master strategist who can help Gemini focus on the best options to make decisions and to finish things off before jumping into the next experience. Gemini in turn can teach Scorpio to be more spontaneous, let go and move on when their efforts are thwarted.</p>";
  
   return starMsg;

}


function getGeminiSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> couple are highly compatible. They are great friends and as well as lovers that share common interests, similar personalities and life view. They are also well-matched in their refreshing optimism, energy and enthusiasm - these two love new experiences, people and sensations. Gemini comes up with a new idea and Sagittarius jumps in ready to explore it to its limits. Both bring a lot of energy to the table - their relationship will be filled with passion and exciting new adventures.</p>"
          + "<p>Gemini being an Air Sign and Sagittarius a Fire Sign means they have the ability to transform ideas into action together as Air fuels and spreads Fire. There is a lot of passion between – they share a deep understanding and connection both can feel almost right from the first time they meet and the energy in this union will be warm happy and positive most of the time. Both Signs being Mutable also bodes well for the long term and short term fun of the relationship as it means they are extremely flexible and willing to adapt to change. When Sagittarius suddenly decides to travel, Gemini is happy to go along.</p>";
 
   return starMsg;

}


function getGeminiCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>Gemini and Capricorn bring a lot of differences to the table as they are polar opposites in many respects therefore it is important they embrace their differences. Capricorn is quiet and unassuming and a home body which stands out against Gemini’s boisterous outgoing nature. Capricorn tends to be slow, steady, thorough and stubborn concerned with advancement and status who tends to follow the rules and tried and tested paths to success and is about perseverance. Gemini, on the other-hand is quick, flexible, tends to changes their mind and takes short-cuts. And so the differences continue. However, Gemini-Capricorn blend well together as a whole - each brings their own qualities to the relationship. Gemini-Capricorn may make much better business partners than they do lovers.</p>";
  
   return starMsg;
 
}    
       

function getGeminiAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a very compatible, well-balanced matched couple romantically and as friends who share a deep understanding that will stand the test of time. Both love their independence, are social, have multiple, wide-ranging interests, lots of energy, quick minds and enjoy a mental connection highlighted by long intellectually stimulating conversations. As similar as they are, they also have many differences that balance each other out beautifully.</p>"
          + "<p>Aquarius and Gemini both being Air Signs means they have a strong intellectual bond. Gemini-Aquarius provide one another with a sounding board for ideas which both have fun exploring together. Aquarius with their progressive, original mind also brings determination to the table being a Fixed Sign, which can help Gemini focus put ideas into action. Gemini being a Mutable Sign, brings flexibility to the table that can help Aquarius in times of tension or rigidity.</p>";
 
   return starMsg;

}    

       
function getGeminiPiscesCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are compatible romantically as well as friends. They have shared interests including a mutual interest in utilizing their intellect and cultivating knowledge. Gemini, being an Air Sign and Pisces a Water Sign, is a combination of an intellectual focus with emotion and intuition which together can make solid decisions - therefore they can achieve much if they work together.  Both are Mutable Signs thus are adaptable and flexible, very able to deal with life’s changes and experiences – they are also open and willing to understand and embrace each other’s differences. Both are open minded and change their mind a lot. Neither needs to take the lead and can provide each other the space and freedom they need and seldom squabble and when they do, get over things quickly and easily.</p>";
 
   return starMsg;

}    
    

function getCancerCancerCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg="<p>Cancer is symbolised by the Crab, is the Sign of the home and is ruled by the Moon (Emotion) and are the mothers of the Zodiac who are introverted, nurturing, empathetic and highly intuitive. Cancers love to be adored and crave commitment in a relationship and make excellent parents. Usually they are cautious not to show their vulnerabilities at the beginning of a relationship. When handled with care and respect, they blossom, give their all and are very loyal, devoted and determined to work things out. They will also fiercely protect and defend their loved ones. Known for their sensitivity, Cancers can be very sentimental when things are going well, yet if things get difficult, their sensitive feelings get hurt very quickly.</p>"
         + "<p><strong>Cancer-Cancer</strong> are very compatible and share a strong emotional bond whose relationship is based on common ground rooted in the desire for all the same things. Both want to create a warm, secure home environment with material comforts - a perfect love nest for the growing and cultivation of a healthy relationship. This pair are devoted to each other and willing to work, protect and fight for the survival and success of their relationship, happy domestic life and nurturing a loving family. This couple can instinctively meet each other's needs and are caring, helpful, committed and faithful and treat their partner like they would cherished possessions. There is a lot of romance and passion in this union.</p>";
   
   return starMsg;

}

function getCancerLeoCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> combination are a highly compatible. They share a positive, supportive and healthy vibe and a mutual commitment to a sincere, long and happy relationship and are fiercely loyal to the point of possessiveness. They are seen as a winning combination as both have a mutual desire for a secure, loving relationship with a deep connection which they are able to offer each other in their own unique ways, which makes them strive for harmony.  Both are strong minded and fill important voids in each other’s lives as they understand and know how to satisfy each other’s basic emotional needs. Leo brings passion, creativity, and energy to the table whilst Cancer is the one who starts long and emotional conversations.</p>";
     
   return starMsg;

}

function getCancerVirgoCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>A <strong>" + star1Sign + "-" + star2Sign + "</strong> union is a highly compatible one based on common sense and strong principles. Rooted in love and devotion, appreciative and communication, both are disciplined and sincere and share a strong sense of purpose towards the same goals. This includes a desire for prosperity and a nice stable home life which both will work hard for - both enjoy the material comforts earned from honest hard work.  Neither are built for flings so this relationship may be a slow burn that has potential for long term success. It may not be the most adventurous or exciting relationship but one where each nurtures the other towards abundance and prosperity.</p>";
   
   return starMsg;

}


function getCancerLibraCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> relationship is usually is a slow burn as they may at first appear to have little in common other than their mutual need for companionship. However, both appreciate domestic balance and stability and share a love of the idea of marriage, beauty and aesthetics, luxury and life’s comforts - especially in the home. Their similar tastes and loves make theirs a relationship of great dedication and harmony. Both also share nurturing personalities, desire harmony over conflict and complement each other - both want and can give what the other lacks, thus blending their energies harmoniously towards common goals and shared visions.</p>";
          + "<p>Here we have the Water Sign of Cancer combined with the Air Sign of Libra. Cancer is the emotional one and Libra the thinking one so both parties come into this union from very different places.  Both are feminine energies which bodes well for a long term relationship marked by love, beauty, and flow of emotions.</p>"
 
   return starMsg;

}


function getCancerScorpioCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong>are very compatible who share an instant mind, body and soul connection. Soul mates quick to recognize the kindred spirit in the other, they feel like they have always know each other and their relationship was meant to be. Once they learn to trust and believe in one another and agree on goals, they can achieve almost anything through sheer determination which makes their relationship a very strong one. Both have a lot in common including the desire for emotional and financial security, a comfortable home and are fiercely loyal. They are a harmonious pair who complement each other well - each partner’s strengths balances the other’s weaknesses.</p>";
       
   return starMsg;

}


function getCancerSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> can make a compatible couple once they accept and celebrate their differences and life philosophies. Both want long term love but have different personalities and lifestyle approaches; Sagittarius is flexible, freedom loving, thrill seeking, and a restless wanderer whilst Cancer loves to lead, lives on emotion and tradition and wants security.  The relationship can be a complimentary one if they embrace their differences and realize they have much to offer each other; Cancer can offer a Sagittarius a secure home base and strong emotional support whilst free spirited Sagittarius can offer Cancer some excitement and diversity and the virtues of an open mind over constant and inflexible determination. Cancer is a feminine energy and Sagittarius a Masculine one so they are well balanced in this respect.</p>";
 
   return starMsg;

}


function getCancerCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> being on opposite sides of the Zodiac are very compatible and create a very successful, secure connection. Their shared visions and commitment towards long term goals, morality and sense of responsibility make them a highly compatible couple. Both also love beauty, quality and luxury and are willing to work hard for them.  This is a slow growing relationship that builds from a strong foundation of material and emotional security. It is a traditional one where Cancer is likely to the home maker and Capricorn the successful provider who practices integrity and discipline to achieve goals.</p>"
          + "<p>Both Signs are home bodies and what this union lacks in excitement and energy, it makes up for in devotion and loyalty. This pair has an intuitive way of knowing when and what the other wants and needs. Their differing dispositions complement each other well — mothering Cancer steps in when emotional counselling is needed and Capricorn, who excels in getting the nitty-gritty done, can teach Cancer to be more disciplined and go out into the world and strive toward goals.</p>";
 
   return starMsg;  

}    
       

function getCancerAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>A <strong>" + star1Sign + "-" + star2Sign + "</strong> union is a case of opposites attracting who can complement each other over time. Cancer is conservative and traditional who needs to be felt understood which is the exactly the opposite for forward, contemporary thinking Aquarius. Although they are opposites, Aquarius can teach Cancer the value of a detachment and Cancer can teach Aquarius the value of emotion and their feminine influence will bring comfort and beauty into their home. Cancer being a Cardinal Sign and Aquarius being a Fixed Sign means both are determined to persevere to the end therefore if they can agree to work toward a common goal, they can get along and be indomitable as a combined force who can embrace and celebrate their diversity. Cancer has feminine energy and Aquarius Masculine, so they are well balanced in this respect.</p>";
 
   return starMsg;

}    

       
function getCancerPiscesCompatibility(star1Sign, star2Sign){
  
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a very compatible union who share a beautiful idealistic, spiritual almost divine connection.  Quick to fall in love, they immediately have an intense feeling of familiarity and just get one another - their relationship is incredibly romantic rooted in a sense of belonging. Although Cancer wants material comforts and success unlike Pisces who prefers a simplistic minimalistic lifestyle, they complement and harmonize with each another very well and their shared emotional depth, makes theirs a long term lasting relationship.</p>"
          + "<p>" + star1Sign + "-" + star2Sign + " as Water Signs have a multifaceted emotional bond – they lead with emotion as opposed to logic and vibrate with warm feminine energy. Basically, both are tolerant and sympathetic, can act as a teacher and student and feed of each other’s energy very well. Cancers practicality can guide Pisces how to turn their dreamy utopian ideas into reality. Pisces in turn can open a Cancer’s eyes to the world of creativity and spirituality.</p>";
 
   return starMsg;

}    
    

function getLeoLeoCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>Leo is symbolized by the Lion and is ruled by the Sun (Self) and are the natural leaders of the Zodiac who are noble, courageous, fiery and determined. Leo’s seek someone who is adventurous and spicy who they can love and trust for a lifetime in a relationship. A Leo man likes a challenge, so to win his heart let him pursue you and be difficult but not impossible, to catch. A Leo woman’s heart can be won by satisfying her ego whilst at the same time conveying to her that you match her strength.</p>"
          + "<p><strong>Leo-Leo</strong> are a happy, optimistic fun-loving couple who enjoy entertaining, socializing and amusing one another. These creative, gregarious natural born leaders are instantly attracted to one other’s good looks and being Fixed Signs makes them committed to one other. Both have traits they admire about each other which include bravery and loyalty. Devoted to pleasure, this couple enjoy the finer things in life and feed off the other’s need for constant attention and admiration which draws them together - they intuitively understand the others need for flattery which is Leo’s Achilles’ heel. Although these two Fixed Fire Signs, joining forces makes for a very romantic, passionate connection, to remain compatible, each must learn to tame their tempers and bossiness.</p>";
 
   return starMsg;

}

function getLeoVirgoCompatibility(star1Sign, star2Sign){
  
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> work effectively as a complimentary couple as they are opposites in many ways. Their relationship evolves over time as each partner warms up to the others style. Leo is extroverted, dominant and charismatic with a short fuse whilst Virgo is introverted and more versatility than Leo. Leo can introduce fun and spontaneity into Virgo fun life and gain stability from Virgo who can also teach Leo patience and how to be sensitive to other people’s needs. The key to the success of this relationship is Leo and Virgo’s commitment to a loyal partnership and commitment to embrace their differences.</p>"
          + "<p>Leo being a Fixed Fire Sign, enjoys being in the centre of things taking charge, managing a project and delegating whilst Virgo being a Mutable Earth Sign, is happy to be delegated to and work hard behind the scenes therefore they fit well in this respect. This couple are also a good balance of masculine and feminine energy.</p>";
 
   return starMsg;

}


function getLeoLibraCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>A <strong>" + star1Sign + "-" + star2Sign + "</strong> union is a highly compatible one rooted in passion, energy, and harmony. They have a lot in common and things they agree on and each partner makes up for what the other is missing so this is a great learning experience for both partners. The differences between this pair are what will keep them going.  Both have a lot of dominate energy, but not the kind any that will overtake the other. Leo is the leader in this relationship due to their strength and forceful nature. Leo likes to give orders through personal authority and to delegate. Libra on the other hand, quietly takes the reins from a team-oriented and intellectual perspective and charms others into doing things. Libra is also happy to placate Leo’s big ego.</p>";
     
   return starMsg;

}


function getLeoScorpioCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> can make highly compatible, exciting and dynamic couple.  Both Signs have very powerful yet strategically different personalities, are very determined and dedicated to fulfilling their desires, deeply loyal and committed and intense in their own unique ways.  Both are also very intuitive in their own unique ways which means they have a tendency to naturally understand the meet each other’s another’s needs as quickly as they arise. Leo wants to be in the limelight and Scorpio is happy to be in the background controlling the mechanics and will appreciate Leo as long as there is equality in the relationship.</p>";
 
   return starMsg;

}


function getLeoSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a highly compatible union who are willing to work as a team whose relationship is based on excitement, passion, deep admiration, respect and common ground.  They understand one another because they are so similar. Each knows and is able to provide what the other needs and encourage the other to aim even higher. Both are warm, charismatic, charming and dynamic people who enjoy life to the full and are fun to be around.  However, if Leo and Sagittarius want their relationship to last, both will have to embrace their commonalities and learn to overcome their differences.</p>"
          + "<p>Both Signs have masculine and boundless energy and can keep up with each other’s intensity. Their relationship is heated and passionate as both are Fire Signs which can keep their connection alive long term. Both are also social so there will be few, if any, arguments over going out or staying in and many spontaneous travel plans.</p>";
 
   return starMsg;

}


function getLeoCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> may seem like an unlikely couple - a case of opposites attracting however, can form a mutually supportive union as they discover similarities and embrace their differences.  Leo is impulsive, quick and loves to flirt whilst Capricorn has a more classical simple nature and prefers life to be steady and ordered. Capricorn will want to get to know Leo before diving into a serious relationship. Both believe in hard work but Leo tends to get things done through charm and social skills. These two can learn from one another’s diversity; Capricorn can prove to Leo the value of hard work, responsibility and traditional values and Leo can show Capricorn how to have a good time.</p>"
          + "<p>Leo and Capricorn are Fixed Signs therefore persevere towards their goals and are extremely devoted to one other. Both love the spotlight and want the same things including financial success, long term love and pampering. For this match to work long term, both will need constant reminder of their shared visions and goals.</p>";
 
   return starMsg;
   
}    
       

function getLeoAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a highly compatible romantic, passionate couple who share more common ground than differences. This partnership is a merging of Leo’s creativity and Aquarius foresight and is packed full of energy and action with few dull moments. Both pride themselves on their independence and tend to be highly motivated, idealistic big thinking visionaries and are thrill-seekers attracted to all things novel who may occasionally even turn life into a game of Truth or Dare.</p>"
          + "<p>Leo and Aquarius as Fixed Signs are very loyal and committed. They create magic together combing vision and practice. When this couple, get an idea, they plan how to put it into action, get the ball rolling and see it through to completion. Leo being a Fire Sign and Aquarius being an Air Sign are like the Elements when they combine, feeding a process of mutual personal growth and development.</p>";
 
   return starMsg;

}    

       
function getLeoPiscesCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>Leo and Pisces are two very different personalities however, share a lot of common goals. Both are dreamers but are polar opposites in many ways who can however, fill each other’s voids and have a caring mutually beneficial committed relationship. Leo is a strong, assertive natural born leader who often becomes the guardian of weaker Pisces who tends to give themselves over to their partner and is quieter, more reserved and introspective. Leo-Pisces have the ability to provide what the other needs and the willingness to please each other. Pisces is happy to give Leo attention and flattery and can show Leo how to be humble, sensitive and caring.  Leo is happy to make Pisces feel special and can show Pisces how to make their fantasy dream world a reality. Leo's masculine energy also complements Pisces feminine energy very well.</p>"
          + "<p>Leo being a Fire Sign and Pisces being a Water Sign means, although their relationship is steamy, it may not be harmonious at times and like the Elements that influence them, these two have the ability to cancel each other out.  Leo-Pisces can have an exciting, passionate romantic and steamy connection with potential to work long term if both parties are willing to put in the work to embrace both their differences and common goals.</p>";
 
   return starMsg;

}    

function getVirgoVirgoCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p><strong>Virgo</strong> is symbolised by a Virgin and is ruled by Mercury (Communication) and are introverted, grounded, flexible and detail orientated with a logical and systematic approach to life. Conservative by nature and cautious with their hearts, Virgos prefer old-fashioned traditional courtship, appreciate honesty and openness in a relationship and are looking for long term love. They have high standards and are attracted to people who demonstrate good manners, integrity and common sense and take care of their appearance by being neat, clean and well-groomed.</p>"
          + "<p>A <strong>Virgo-Virgo</strong> combination are a highly compatible, perfectly matched pair who are similar in almost every way.  It is a merging of two practical, industrious well-organised people determined to succeed and who are devoted to each other. Their relationship runs like a well-oiled machine, particularly for couples who live together or have children; running the home, delegation of responsibility and balancing accounts are second nature to both.  Virgo also always follows through, so the two of them together doubles this energy. Both have exquisite taste and love beautiful and are willing to work hard for them so this is also a financially successful team.</p>";
   
   return starMsg;

}


function getVirgoLibraCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>A <strong>" + star1Sign + "-" + star2Sign + "</strong> relationship may be slow to start but will rev up when they get to know one another and realize they complement one another in many ways, fitting together like a jigsaw puzzle.  Both share pleasing personalities and a love of art and aesthetics - together they bring culture and beauty to the world around them. Practicality and pleasure are also important to both Signs plus a strong desire for balance and long term love. Both are also able and willing to see the different sides of an argument and make decisions after examining the facts.</p>"
          + "<p>Virgo being an Earth Sign, is pragmatic whilst Libra, being an Air Sign, is interested in ideas and theories regardless of how useful they are which means each partner may sometimes find it difficult to understand where the other is coming from.  Libra being a Cardinal Sign, is the leader in this relationship without crossing the line into domination and Virgo, being a Mutable Sign, is easy-going and happy to take Libras lead.</p>";
 
   return starMsg;

}


function getVirgoScorpioCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> union is well aligned for domestic bliss. They have an intense karmic bond and get on as if they have known each other all their lives.  Virgo's even temperament is well suited for Scorpio and vice versa, there is good give and take here and the strengths and weaknesses of Virgo and Scorpio are complementary. Virgos are often taken advantage of, however, this is an unlikely dynamic between Virgo and Scorpio. Both of these Signs are about resources and are very service-oriented who like to lend a hand to friends or community and are known to be dependable. This is a slow-moving relationship that develops from friends and is very loving and passionate one like a long lasting, more traditional partnership.</p>";
    
   return starMsg;

}


function getVirgoSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>Although Sagittarius and Virgo may appear on the surface to have more differences than common ground they do however, make a well-rounded compatible couple. Both are looking for a rooted but entertaining partner which is exactly what each of them brings to the table, in their own unique ways. They move at different speeds when it comes to the pace of this relationship; Virgo moves slowly and Sagittarius moves fast, therefore will need to learn to give and take.  Both being Mutable Signs however, means they are flexible and adaptable to almost any situation which will help them navigate bumps and differences in their relationship and keep it alive.</p>";
     
   return starMsg;

}


function getVirgoCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>A <strong>" + star1Sign + "-" + star2Sign + "</strong> relationship is a solid, smart, pragmatic, materially secure highly compatible union who share a comfortable life of romantic and domestic bliss. Both Signs are highly rational and reliable and have high expectations of themselves and others. They share many of the same qualities and their differences meet each other's needs as well. This relationship is slow to start and will probably end in marriage.</p>"
          + "<p>" + star1Sign + "-" + star2Sign + " are Earth Signs dedicated to similar goals; both need material success and work hard and well together to achieve their goals. Capricorn is a busy worker bee and can help Virgo achieve goals and makes dreams a reality through initiation and discipline. Virgo will assist in keeping the relationship, business or home front a well-oiled machine and can help Capricorn relax and appreciate all they have worked to attain and brings real talk and the gift of communication to the table.</p>";
       
   return starMsg;

}    
       

function getVirgoAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p> Virgo and Aquarius have little in common and can bring out either the best or worst in each other. However, both are committed and can thrive on appreciating their differences. Aquarius tends to be quick, passionate, temperamental and modern and dislikes routine whilst Virgo operates slowly and methodically and is very organized and level headed. Both, however, appreciate harmony and balance and want a long term relationship that works and are both grateful for the other's high intellect.</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> both being Air Signs, are big thinkers and their combined ambition and passionate intent, drives them when working towards their goals – together they can accomplish miraculous deeds.  They can also enlighten each other with their different perspectives of the world in unique exciting ways and can learn much from their partner.</p>";
 
   return starMsg;

}    

       
function getVirgoPiscesCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p>Virgo and Pisces adore and dote on one another and share a beautiful spiritual connection that their friends and community envy. They strive for a harmonious relationship and are a very accepting, easy-going and sympathetic duo who often devote their time to helping others. Their relationship has great marriage potential; together, they represent an idealistic partnership - each makes up for qualities the other lacks and brings out the best aspects in the other. Virgo provides a steady base for the more emotional and intuitive Pisces and can give Pisces the tools they need to turn ideas into reality. On the other hand, Pisces brings a kind nature and open heart to the table.</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> have a complementary and harmonious attitude toward one another. Each are continuously inspired and assisted by one another, forming a steady stream of excitement and cyclical ring of new ideas. Also as Mutable Sign, neither are too clingy and appreciates the freedom the other needs.</p>";

   return starMsg;

}    

function getLibraLibraCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p><strong>Libra</strong> is symbolised by the Scales, is the Sign of partnership and is ruled by Venus (Love & Beauty) and are the social butterflies of the Zodiac concerned with beauty, art and balance in life and relationships. Relationships are what Libra does best – they are one of the most thoughtful, caring and loving Signs of the Zodiac and will give their all to the people they love. Libras are romantic and fall in love easily and are most attracted to good-looking people who are articulate and can hold their attention.</p>"
          + "<p>A <strong>Libra-Libra</strong> combination are diplomatic, kind and have mutual respect. Libras is the Sign of partnership and two Libra’s together spells a highly compatible blissful relationship. Harmony, peace and love will be in abundance when two Libras join forces and will feel like a destined and karmic connection for the duo. They bring a beautiful touch to everything they do and are a charming, elegant, intellectual, agreeable and magically balanced couple whose relationship is full of romance, beauty, sensuality and pleasure.</p>"
          + "<p>Libra is a Cardinal Air Sign, a quality that allows them to initiate new projects and motivate others therefore they work very well together toward any project they set their mind to.  Their mutual understanding and ability to meet each other’s needs means the commitment between them is likely to be solid.</p>";

   return starMsg;

}


function getLibraScorpioCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a compatible duo due to their similar needs for a relationship; Libra is happiest when in a well-balanced and intimate relationship, whilst Scorpio thrives on emotional and romantic intimacy. This is an exciting relationship as both partners love taking risks, and are real charmers who know how to seduce.</p>"
          + "<p>Libra being an Air Sign and Scorpio a Water Sign means Libra-Scorpio combine the powers of intellect and the emotions therefore can meet almost any challenge and understand almost any puzzle. After all, as the best descions are made using both the head and the heart. Together they can accomplish a lot either in business or in the romantic sphere. Scorpio, who is a master strategist, can help Libra focus on ideas and follow through with them, a trait the Libra usually lacks. Libra’s proclivity for harmony and balance on the other hand, can help Scorpio, who is a brooder, even out their emotions.  Although they have remarkable differences in how they pursue life, they make a very loyal, devoted and mutually satisfying union.</p>";

   return starMsg;

}


function getLibraSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);

   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are highly compatible as partners and as friends and share a deep, special connection and natural understanding of one another from the beginning.  Both are interested in cultivating knowledge and utilizing intellect and are enthusiastic about finding truth and beauty in their experiences. They share a fresh faced optimism and will go far together and reach new horizons both emotionally and geographically. Libra who has a keen mind for art, beauty and aesthetics makes a stimulating travel companion for Sagittarius who is constantly searching for wisdom.</p>"
          + "<p>Libra being an Air Sign and Sagittarius a Fire Sign means together these two are extremely energetic, heated and arduous and can run far and wide. Sagittarius may think they’re steering the rudder, but Libra controls the flow of events with a quieter hand. Their relationship runs most smoothly when Sagittarius feels they have plenty of freedom and independence within the relationship. Libra being a Cardinal Signs, is the initiator of new ideas and plans, however, can quickly change their mind and Sagittarius, being a Mutable Sign, is adaptable and amenable to any changes Libra wants to make.</p>";
 
   return starMsg;

}


function getLibraCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> is a challenging union as both are very different however, can blend well together to make a whole forming two sides of a coin, so to so to speak if they can learn to work together as a team. Once they understand each other’s styles, their different methods can help them achieve together what they could not achieve alone.</p>"
          + "<p>Libra being an Air Sign relies on their intellect, always has an opinion and are attuned to aesthetics.  Capricorn being an Earth Sign however, uses their brain power to find pragmatic methods in all they do and has no time for aesthetics. Both are natural leaders as both are Cardinal Signs, who initiate projects and motivate others, however, have different work ethics.</p>";

   return starMsg;
  
}    
       

function getLibraAquariusCompatibility(star1Sign, star2Sign){
 
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a highly compatible union likely to get on very well. Both are Air Signs who are energetic and enthusiastic with similar needs who want intellectual freedom and connect on a mental level; they share a love of art, socialising, people and culture and will have many stimulating intellectual discussions about their interests and pursuits.  Aquarius-Libra can serve to strengthen and heighten both Signs’ consciousness as both are concerned with the betterment of the world and man-kind. They an extraordinary duo for standing up for social justice or radical change in the community and can make great things happen using their hearts, urge for progress and their consciousness for the greater good.</p>";
 
   return starMsg;

}    

       
function getLibraPiscesCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> combination make great friends as well as romantic partners. They understand one another and are well-matched in their energy, enthusiasm and desire for a sincere relationship. Both are outwardly modest, value truth and harmony and are mutually interested in helping people and the world around them.  They also have much to offer one another: When Pisces gets lost in fantasy, Libra can assist Pisces get back on track and Pisces can offer Libra help to see the beauty in love and empathy.</p>"
          + "<p>Libra being an Air Sign and Pisces being a Water Sign means they can combine their heads and their hearts to solve all problems. After all, the best decisions are made with both the intellect and emotion; this relationship tends to be flexible and progressive.  Libra being a Cardinal Sign, comes up with ideas and starts new projects and Pisces, being a Mutable Sign, is happy to go along with any role assigned to them or to switch direction if Libra changes their mind. They work well together; Libra being in the limelight whilst Pisces prefers taking a passenger seat.</p>";

   return starMsg;

}    

function getScorpioScorpioCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);

   starMsg= "<p><strong>Scorpio</strong> is co-ruled by Pluto (Power) and Mars (Passion) and are determined, courageous, jealous and secretive. Scorpios passionate, mysterious nature makes them all the more attractive to many prospective partners. They crave security and take intimacy and closeness seriously as they do not trust many people and are attracted to intelligent and honest partners who can keep them interested and intrigued. They will want to lead and dominate in a relationship so be sure to be firm and hold your ground.</p>"
          + "<p><strong>Scorpio-Scorpio</strong> are a fervently passionate, obsessive couple. Being psychic, they have an intuitive understanding of the needs of the other. They can also bring out the best or very worst in each other. It’s all or nothing for them; their relationship moves very fast and can go either way - utter love and devotion and fierce loyalty or the destruction of both involved. </p>"
          + "<p>Scorpio being a Fixed Sign means, once they set their eyes on someone or something — it’s theirs! Both like to stay active, are very goal orientated and can accomplish much together. They share a knack for investments and calculated risks and will do thorough research and investigation if required. Being Water Signs means extreme up and downs - passion and loss etc is magnified in intensity.</p>";

   return starMsg;

}


function getScorpioSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);

   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> have a lot of spark, steam, energy and fun together. They would benefit from slowing down and getting to know one another on a deep level and celebrating their differences, otherwise the relationship may only last short-term as both want different things. Sagittarius thrives on the new and the exciting whilst Scorpio wants to get closer and strengthen emotional ties which could make Sagittarius feel hemmed down. Both see each day as an adventure and an opportunity to explore and learn – shared escapades and travel could bring them closer together.</p>"
          + "<p>Here we have the Fixed Water Sign of Scorpio combined with the Mutable Fire Sign of Sagittarius. Water and Fire can cancel each other but can also create steam!  Sagittarius is flexible, a positive quality that sometimes wins out over resolute determination, however, can jump from project to project, often losing interest.  Scorpio being a Fixed Sign, has the determination influence of following-through and can assist and run with Sagittarius ideas and projects and take them to the end in this union.</p>";

   return starMsg;

}


function getScorpioCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);

   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> can form a highly compatible loving and nourishing relationship based on friendship and loyalty. This relationship, whose common vision is often marriage, may be slow to develop as both are wary of sharing and trusting; Capricorn is cautious and Scorpio is pensive. Both Signs have an instinctive sense of what the other needs and can also provide it at just the right time. Scorpio is emotional, loving and devoted to hard working Capricorn who in turn gives stability and grounded balance to Scorpios overheated emotions. They can open doors to each other’s souls and show one another new ways of perceiving and feeling.</p>";
    
   return starMsg;   

}    
       

function getScorpioAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> is a fusion of two very different needs and life philosophies. Aquarius is intellectual and extraverted whilst Scorpio is emotional and introverted. However, this union has capacity for success in their synergy once they appreciate their diversity and agree on their individual roles in the relationship. Neither Sign will openly dominate the other as both are strong willed with very powerful personalities. Aquarius can help calm Scorpios overheated emotions and Scorpio can teach Aquarius the value of emotions and physical sensations.</p>"
          + "<p>Here we have two very intense energies coming together; Fixed Water Sign Scorpio paired with the Fixed Air Sign of Aquarius. Air and Water elements do not mix well; Scorpio being a Water Sign, is analytical who seeks purpose whilst Aquarius being an Air Sign, is a big intelligent thinker who seeks intellection stimulation and philosophical conversations. Both are Fixed Signs therefore are unyielding, dogmatic and persevering which also means they are loyal and can overcome their differences if they believe in the value of the relationship.</p>";

   return starMsg;

}    

       
function getScorpioPiscesCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> share a cosmic connection which feels like a soul destined connection from the very beginning. They have a true, committed, fulfilling and harmonious relationship with drama and emotional intrigue. Both are intuitive introverts with similarly intense empathetic, emotional natures and have an understanding and insights into each other’s minds and hearts. However, their long-term aspirations differ; Scorpio is interested in material comforts unlike Pisces who prefers a simplistic way of life. Scorpio however, can help Pisces turn their dreams and ideas into reality with their tenacity and Pisces in turn, brings gentleness, kindness, and sympathy to the table.</p>";
   
   return starMsg;

}    
    
function getSagittariusSagittariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p><strong>Sagittarius</strong> is symbolised a half horse and man archer, is ruled by Jupiter (Luck) and are the wanderers of the Zodiac who are adventurous, extraverted, fiery and easy-going. Sagittarius enjoys a challenge and especially are attracted to confident, outgoing partners who are honest and upfront and gravitate towards natural-looking partners. Sagittarius is the Zodiac Sign that’s toughest to commit as they need a lot of freedom, excitement and a sense of purpose in a relationship. Once Sagittarius does commit however and, although they may still flirt outside the relationship, they are loyal to the core.</p>"
          + "<p>A <strong>Sagittarius-Sagittarius</strong> union is highly compatible one they share a hunger for knowledge and are the perfect balance between intensity and allowing the other breathing space. Both are independent and neither are jealous and have their own interests outside the relationship.  When together, they explore the vast world outside as well as the intellectual world and engage one another in pleasant conversation and banter.</p>"
          + "<p>Sagittarius being a Fire Sign means when two come together, they merge to build a bigger flame. Outgoing and friendly, they love to engage in new projects such as spontaneous road trips. Neither however, have the dedication to see projects through, as they are far too eager to move on to the next new thing. Sagittarius being a Mutable Sign means they are easy to get along with and extremely accommodating. However, can fly off the handle at times but don’t hold a grudge or let disagreements fester for very long.</p>";

   return starMsg;

}


function getSagittariusCapricornCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> is a union of opposites who are an excellent couple due to their well-rounded, complementary natures. They are different personalities in so many ways and each partner can learn much from the other. Sagittarius can show responsible Capricorn how to lighten up and bring excitement and adventure into Capricorns life that’s often missing. Sagittarius, who can be reckless and impulsive, at the same time can gain stability, good manners and attention to detail from Capricorn rational outlook. Their differences can forge a stronger relationship in the long run once they focus on each other’s strengths instead of flaws.</p>";
     
   return starMsg;

}    
       

function getSagittariusAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> combine to make a formidable creative and unique couple of outward motion as well as inward depth. When they come together, they are an innovative, inventive team who use intellect and a sense of adventure to gain new experiences — each fosters creativity in the other. They are great friends who admire each other, see eye-to-eye, communicate well and have excellent rapport. Both have a wide variety of interests, relish their independence and are idealistic and excited about life who can get competitive so there is never a dull moment!</p>"
          + "<p>Sagittarius is a Mutable Fire Sign and Aquarius as a Fixed Air Sign which is a combination that covers all bases. Aquarius can inspire Sagittarius to make great leaps and follow through with ideas. They feed off each other and can fly together without fear of falling.  Both are devoted and loyal to one another and can get past a lot together.</p>";

   return starMsg;

}    

       
function getSagittariusPiscesCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> may seem an unlikely pair as they are opposites in some respects, however, also have a lot of common ground and shared values. They get along well and at the same time can benefit from one another’s wisdom and have the ability to provide what the other lacks which makes theirs a reciprocal relationship. Pisces can show Sagittarius how to empathize and care and can also calm Sagittarius’s occasional hot headed outbursts; Sagittarius who often is protective of their gentle partner, can in turn help Pisces plant realise their dreams and fantasies and encourage them to explore the world.</p>"
          + "<p>Sagittarius and Pisces are both Mutable Signs so have easy going natures. Neither needs to dominate so there is no conflict over roles which helps them work towards the same goals with great success. They enjoy helping each other and have an equal and passionate relationship. If they decide to be commit to each other, only something major that will break them up.</p>";

   return starMsg;

}    


function getCapricornCapricornCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p><strong>Capricorn</strong> is symbolised by a sea goat and is ruled by Saturn (Karma) and are the fathers of the Zodiac who are conservative, grounded, reliable and trustworthy.  Capricorns are Earth Signs and are excellent providers who make solid partners as they usually ensure they are established in all areas of life before choosing a mate, which is a serious consideration for them. Their dream is to be a part of a power couple and are drawn to people who can hold their own like them. Dignified traditionalists, Capricorn’s are typically shy and serious and may seem unattainable and a little standoffish. Easily embarrassed, they avoid negative attention or humiliation at all costs. Emotionally, this Sign is tight-lipped and reserved, preferring to show their affections through actions rather than words.</p>"
          + "<p>Capricorns take commitments super seriously and once they have invested time and effort in a relationship, they feel morally compelled to stick with it.  They are the most persevering tenacious Sign of the Zodiac the least likely to break up quickly when the going gets tough. Realistic and pragmatic, they know compatibility between two souls is not based on initial sparks, neither are path to genuine happiness smooth and easy and relationship difficulties and setbacks are challenges in the evolution of love. They have the patience and staying power to take the long steady route to establish something real that stands the test of time if confident their partner is worth holding on to. Capricorns are famous for getting better and more attractive as they get older, and their relationships tend to follow the same pattern.</p>"
          + "<p><strong>Capricorn-Capricorn</strong> magnifies their energy and strength as a couple and enjoy a strong, healthy and mutually beneficial relationship built to last - both want a long and happy life together.  Dedicated to taking care of their personal and shared responsibilities, this couple are charitable, loyal, loving and devoted but not as emotionally intertwined as other couples of the Zodiac. Each communicates well and enjoys getting things accomplished together including running a household, but also relish the space to pursue individual interest.</p>";

   return starMsg;
  
}    
       

function getCapricornAquariusCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> may seem on the surface like a union of total opposites, however, they tend to form an unbreakable bond and bring out the best in each other. Both want a long term love and are devotion to one other. Traditional Capricorn can show Aquarius a life based on organization and comfort. Modern Aquarius can help Capricorn dream more and stand up for their beliefs. This relationship will be enlightening and a delight to both partners and those around them.</p>"
          + "<p> Capricorn being a Cardinal Sign and Aquarius a Fixed Sign means both can be opinionated, stubborn and implacable therefore compromise is a problem with this pair due to their pig-headedness.  Both have an intense drive to get what they want and will not stop until they get the object of their desire. However, need to understand they have to work together to achieve common goals. Capricorn prefers to initiate ideas and delegate roles and Aquarius is happy to help as long as the role is a substantial one.</p>";
   
   return starMsg;

}    

       
function getCapricornPiscesCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a highly compatible union due to their unique blend of temperaments.  This honest couple admire one another, enjoy sharing their lives and helping each other achieve their goals – both their needs can be fulfilled by their partner. Pisces who takes on the needs of others, enjoys indulging regimented Capricorn’s desire for domestic bliss via a neat, tidy comfortable yet fancy home that shows off their status. This relationship may develop slowly and get stronger over time.</p>"
          + "<p>Capricorn being an Earth Sign and Pisces a Water Sign makes Pisces the fuelling force behind the relationship, but in a passive way. Capricorn being a Cardinal Sign, is the leader in this relationship who comes up with ideas and delegates whilst Pisces being a Mutable Sign, is easy-going and happy to be delegated to. They work well together as there is no conflict over roles; Capricorn being in the limelight whilst Pisces prefers taking a passenger seat.</p>";

   return starMsg;

}    


function getAquariusAquariusCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p><strong>Aquarius</strong> is symbolised by the water bearer and is ruled by Saturn (Karma) and Uranus (Rebellion) and are the ground breaking revolutionaries of the Zodiac who are freedom loving, determined, quirky idealists. It takes a secure person patience to win the heart of an Aquarian. Most want to be in the friend’s zone first and may eventually see you in a romantic light. The effort is worthwhile as when they do, they will be extremely loyal and dedicated as they have a high sense of moral obligation. They will lift you up and encourage you to follow your dreams and show their love with surprise dinners or sentimental gifts.</p>"
          + "<p>An <strong>Aquarius-Aquarius</strong> duo’s relationship is a great asset for the community for innovation and cultural reform as well as one that incurs the jealously of friends. They get on well together and enjoy sharing conversations on current events and discussions on modern, progressive ideas. Independent and cosmopolitan, they are an active, outgoing sociable pair who enjoy helping others and spend most of their time away from the home. They work well together as part of a larger whole such as an organization, business or group.</p>"
          + "<p>Aquarians being Air Signs, can have such extreme and eccentric intellects that they are known as the Einstein’s of the Zodiac. Ideas flow between these creative minds and both partners respect one another’s contributions to a shared goal. Aquarius being a Fixed Sign, is a quality that makes this couple incredibly stubborn as well as fiercely loyal and devoted to making their relationship work.</p>";

  return starMsg;

}    


function getAquariusPiscesCompatibility(star1Sign, star2Sign){
   
   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p>" + star1Msg + star2Msg + "</p>"
          + "<p><strong>" + star1Sign + "-" + star2Sign + "</strong> are a compatible couple to their common interests and reciprocal personalities. This duo creates a complementary relationship deep in intellectual and emotional resource - they make very good friends as well as romantic partners. Both tend to be introspective, idealistic, modern and cosmopolitan and have a mutual interest in cultivating knowledge and are well matched in their energy, enthusiasm and desire for a sincere, open and honest relationship.</p>"
          + "<p>" + star1Sign + "-" + star2Sign + " work well as a team; both dig deep for the truth and seek solutions to problems. Pisces as a Water Sign, is motivated by feelings and emotions whilst Aquarius as an Air Sign is motivated by logical thought and is constantly coming up with new inventions and ways of doing things. Aquarius can learn social tolerance and warmth from the demure Pisces.  Aquarius being a Fixed Sign, is a quality that makes them incredibly strong willed and stubborn whilst Pisces being a Mutable Sign is easy going and accommodating. Neither therefore ague over roles nor who takes the credit for their achievements.</p>";

   return starMsg;

}
       
function getPiscesPiscesCompatibility(star1Sign, star2Sign){

   var starMsg = "";
   var star1Msg = getStarCompatibilityMsg (star1Sign);
   var star2Msg = getStarCompatibilityMsg (star2Sign);
 
   starMsg= "<p><strong>Pisces</strong> is co-ruled by Jupiter (Luck) and Neptune (Illusion) and are quiet, dreamy, laid back gentle souls who are sensual and emotional as well as creative and intuitive. Empathetic and altruistic, they prefer a simplistic way of life. They favour being rather than doing and have a calming influence on people and situations and remind people to be accepted for who they are and not what they do. Looks are secondary for Pisces who want a partner who is attracted to them not only physically but also to their minds and spirits with whom they can form a deep emotional bond. They pride themselves on being connected to more than just the physical world and want partners who share that curiosity. They are attracted to sweet, soft spoken, kind and caring people and dislike arguments, drama and backstabbing gossip. Pisces will understand your emotional ups and downs and will love you even more for sharing your intense feelings with them.</p>"
          + "<p><strong>Pisces-Pisces</strong> is a union of two sensitive, emotional and mellow people who communicate honestly and openly and get along very well together. They love and adore one other and share a rich emotional bond and a deep spiritual connection. This couple are slow to start and commit but once they do, they are loyal and want to maintain their ideal relationship and feel it is the most is the most wonderful precious thing in the world. Gifts, breakfast in bed and weekend getaways are a common occurrences in a Pisces-Pisces relationship.</p>"
          + "<p>Pisces is a Mutable Water Sign a quality that makes them extremely flexible and adaptable, therefore easy going and willing to bend to the needs of others. This couple seldom rock the boat or fight and are very supportive of each other. They shower each with affection and are always be there for their partner when they need them the most. When it comes to a peaceful, easy relationship, they are the unparalleled envy of the Zodiac.</p>";

   return starMsg;

}    
      
    