#movies
======

##Lokaverkefni í TOL306G Vefforritun Haust 2013 við Háskóla Íslands.

###Verkefni unnu Sigurður Karlsson og Svavar Árni Halldórsson.

    Hugsun bak við verkefnið var að sýna fram á að við værum búnir að ná tökum því helsta
    sem kennt var í námskeiðinu og setja upp snyrtilega og einfalda 
    kvikmyndasíðu sem myndi virka vel fyrir allar skjástærðir og væri
    útfærði bæði fram og bakenda virkni á borð við gagnagrunnavinnslu, javascript 
    með jquery og php.


##Yfirlit yfir síður og virkni:

    Heildarútlit síðunar er fengið úr bootstrap framework-inu og er því
    skalanlegt niður á farsíma.

###index.php: 
    json gögn um væntanlegar myndir í bíó sóttar af thetvdb.com með 
    jquery  getJSON(AJAX HTTP GET) aðgerð. 
    Gögnin eru geymd í gegnum jquery.cookies í sólarhring til að gera hana hraðvirkari.

###search.php
    upplýsingar fyrir kvikmyndaleit eru sóttar á sama hátt og í index.php af 
    mymovieapi.com og vistaðar í localstorage með jQuery ef notandi smellir á stjörnu hnapp.

###movies.php
    json gögn frá Íslensku kvikmyndahúsunum eru sótt af apis.is/cinema með php curl og myndir
    birtar, hægt er að velja tíma dags sem leitast er eftir. 
    Gögnin vistuð og sótt með apc_store og apc_fetch til að gera síða hraðvirkari. 
    JQuery ui slider er notaður fyrir síjun.

###myMovies.php
    gögn um vistaðar myndir sótt úr localstorage og birt með JQuery

###signup.php
    Skráning á póstlista.
    Tenging við sqlite3 gagnagrunn og validation fyrir form upplýsingar er útfært í php.


##Hlutir sem okkur finnst að mætti bæta við/laga:

###Forsíða:
	Mætti bæta inn meiri gögnum og filtering:
    Í stað þess að vera eingöngu með væntanlegt í bíó þá mætti setja dropdown 
    menu þar sem t.d mætti velja top lista á imbd, í sýningu 
    o.fl. ef json formattið á gögnunum er eins.
	Eins mætti setja inn "bæta í mínar myndir" virkni af leitar síðunni.

###Bíó síða: 
    Gera töflurnar fyrir hverja mynd með bootstrap
    (fyrir betra look á mobile) þ.e. á mobile birtist 
    láréttur scrollbar og ca. 5% síðu birtist fyrir utan viewport.
    Eins mætti setja inn add to my movies virkni af leitar síðunni.

###Leitar síða:
    Renna í gegnum localstorage þegar gögn eru sótt og gera hnappa 
    græna við þær myndir sem eru þegar á skrá.

###Mínar myndir síða:
	Laga margin fyrir neðan eyða öllum hnappinn.


##Yfirlit yfir villur:

    Validation: Css valation: 33 villur(bootstrap.css)
    HTML valitation: meta villur á bootstrap

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


