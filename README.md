#movies
======

vefforitun_final

##Hlutir sem mætti bæta við/laga:

###Almennt: 
	Leitarvélarbestun, betri tilill á síður.

###Forsíða:
	Mætti bæta inn meiri gögnum og filtering:
    - Í stað þess að vera eingöngu með væntanlegt í bíó þá mætti setja dropdown menu 
    þar sem hægt er að velja, top lista á imbd, í sýningu o.fl. ef json formattið á gögnunum er eins.
	Eins mætti setja inn add to my movies virkni af leitar síðunni.

###Bíó síða: 
    Setja upp bootstrap útgáfu (fyrir betra look á mobile) þ.e. á mobile birtist 
    láréttur scrollbar og ca. 5% síðu birtist fyrir utan viewport.
    Eins mætti setja inn add to my movies virkni af leitar síðunni.

###Leitar síða:
    Laga villuna þar sem að í einhverjum tilfellum þá fer lykill með “” value inn í localstorage 
    sem veldur því tómur movie hlutur birtist í Mínar myndir.

###Mínar myndir síða:
	Sjá að ofan.
    Þegar tómur hlutir birtist veldur það því að ekki er hægt að henda út síðastu myndinni úr localstorage.

##Útgáfustjórn:
    Við notuðumst við git til að annaðist útgáfustýringu og hægt er að nálgast repo-ið hérna
    https://github.com/svavarhall/movies

##Yfirlit yfir villur:

Validation: Css valation: 33 villur(bootstrap.css)
HTML valitation: meta villur á bootstrap + ein id villa (tengt bootstrap)

##HTML outline:

###index.php
Kvikmyndavefurinn
    Allt um bíómyndir
        Væntanlegt í bíó

###search.php: 
Kvikmyndavefurinn
    Kvikmyndaleit. Smelltu á stjörnuna til að vista undir mínar myndir.
        Leitarniðurstöður:

###movies.php
Kvikmyndavefurinn
    Sýningartímar Kvikmyndahúsa

###myMovies.php
Kvikmyndavefurinn
    Mínar myndir:

###signup.php
Kvikmyndavefurinn
    Skráðu þig á póstlista Kvikmyndavefsins

##Yfirlit yfir síður og virkni:
Heildarútlit síðunar er fengið úr bootstrap framework-inu

###index.php: 
json gögn um væntanlegar myndir sóttar af thetvdb.com með jquery og geymd í gegnum cookies með jQuery.

###search.php
upplýsingar fyrir kvikmyndaleit eru sóttar af mymovieapi.com á json sniði og vistaðar í localstorage allt með jQuery.

###movies.php
json gögn frá Íslensku kvikmyndahúsunum eru sótt af apis.is/cinema með php curl og 
apc_store og apc_fetch notað til þessa að cache-a gögnin. 
JQuery ui slider er notaður fyrir síjun.

###myMovies.php
gögn um vistaðar myndir sótt úr localstorage og birt með jQuery

###signup.php
tenging við gagnagrunn og validation fyrir <form> upplýsingar er útfært í php.
