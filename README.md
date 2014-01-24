TripleGem - MVC, php baserat ramverk.
================================
Detta ramverk är uppbyggt som ett projekt under ett flertal kurser i samlingskursen PHPMVC, gjort av mig Per Sjölin.

Installationsguide
------------------
<b>Krav</b>
* PHP miljö
* Server som stödjer SQLite
* Filrättigheter för site/data (chmod 777)
<br>
Steg-för-steg
-------------

1. Klona mitt ramverk ifrån github med gitbash, använd denna adress: <b>git clone https://github.com/egilviking/triplegem.git</b><br><br>
1.1 Det går även bra att ladda ner en zip fil som innehåller hela ramverket:<b>https://github.com/egilviking/triplegem/archive/master.zip</b> , packa upp ramverket till din dator på en lämplig plats.

2. Lokalisera vart ramverket ligger på din dator, detta för att du behöver ändra i <b>.htaccess</b> innan du laddar upp ramverket till din servermiljö.<br><br>
2.1 Öppna upp .htaccess filen i valfri texteditor, på <b>rad 3</b> så finns följande kod:  `RewriteBase /~pesj13/phpmvc/triplegemref/`. Modifiera denna till din egen åtkomstpunkt/domän.

3. Ladda nu upp ramverket med FileZilla eller annat ftp program till din server. Nu behöver du ändra <b>filrättigheter</b> för ett par kataloger. Om du vet hur man ändrar filrättigheter i GitBash så kan du göra det.<br><br>
3.1 I FileZilla, lokalisera ramverket. Högerklicka på `site/` och ge kataloger och filer rättigheterna: <b>777, kryssa i att detta ska upprepas på underliggande filer och kataloger</b>.<br>
3.2 Högerklicka på `themes/` och ge kataloger och filer rättigheterna: <b>777, kryssa i att detta ska upprepas på underliggande filer och kataloger</b>.<br>
3.3 Om du ej gör themes skrivbara med 777, så kan det bli problem att visa logotyper, samt stylning.

4. Surfa in på `www.dindomän.se/triplegem/`.<br><br>
4.1 Om sidan ej kan hittas, dubbelkolla din htaccess fil.<br>
4.2 Om sidan hittas så välkomnas du av startsidan. Längst ner i installationsstycket så finns länken: <b>modules/install</b>. Klicka på den.<br>
4.3 Går även bra att skriva `www.dindomän.se/triplegem/modules/install` i webbläsaren. Du bör då se en sida som talar om att 3 moduler har blivit installerade, dessa är guestbook, content och user. <br>
4.4 Om detta ej funkar, vänligen kolla över filrättigheterna.

Bra att veta
------------
Klicka på gröna triplegem textlogon längst upp på hemsidan, detta tar dig tillbaka till funktionsgränssnittet, <b>kom ihåg det.</b><br><br>Detta är ett substitut istället för att ha en home länk. 
Katalog sökvägar utgår alltid ifrån att man står i `triplegem/` mappen.

Användning av ramverket
-----------------------
Nu är grundinstallationen av ramverket klart, det går nu bra att börja använda.
Uppe i högra hörnet finns en login länk. Klicka på den och prova att logga in med `root:root` för administratör och `doe:doe` för member.<br>
Om inloggning lyckas så kan du ändra användarens kontouppgifter, så som lösenord, email och namn.

Skapa content
-------------
Det går att skapa en del olika content.
Leta efter länken content i spalten till höger. Nu laddas content sidan. Längst ner i spalten actions, så finns länken create new content. Klicka på den.

Nu laddas create content formuläret. 
* Title är förstås bloggposten/sidans titel,
* Key är en nyckel. 
* Content är en textarea, här skriver du in brödtext. Tänk på att implementera de filter som du vill ha.
* Type, här skriver man vilken form av content man skapar.
	För att skapa blogginlägg skriv post. 
	För att skapa en sida skriv page. 
* Filter, här kan man ange olika filter beroende på om man har implementerat dessa i contents brödtext. 
	Filters: htmlpurify, bbcode och plain. Om inga filter önskas, fyll i plain.
  	
Ändra namn/sökvägar på content
------------------------------
Navigera till: `site/config.php` och öppna den i en texteditor. <b>Rad 176</b> är intressant.

För att ändra namn på någon utav de tre länkarna, editera då texten: 'label'=>'About Me'. I detta fall About Me, om denna ändras till About You. Så kommer detta att synas i navigationen på sidan.

<pre>
  'my-navbar'   => array(
    'home'      => array('label'=>'About Me', 'url'=>'my'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
</pre>

Lägg till en page
------------------------------
Följ stegen här ovanför för att skapa en ny page. Kolla nu i listan All content på sidan content, `/content`.
Ditt nyss skapade content ska ha lagts till i denna lista längst ner. Den har då fått ett nummer. Standard så skapas 8 contents som default. Så ditt nya content bör ha fått nummer 9.
Denna siffra behövs för att kunna länka till den nya sidan/page.

Det vi nu vill göra är att skapa en länk som visar sidan. 
Navigera till: `site/config.php` och öppna den i en texteditor. <b>Rad 176</b> är intressant.

För att ändra namn på någon utav de tre länkarna, editera då texten: 'label'=>'About Me'. I detta fall About Me, om denna ändras till About You. Så kommer detta att synas i navigationen på sidan.

<pre>
  'my-navbar'   => array(
    'home'      => array('label'=>'About Me', 'url'=>'my'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
		<b>'mypage' => array('label'=>'mypage', 'url'=>'page/view/9')</b>, /* DENNA RAD LÄGGS TILL FÖR ATT SKAPA EN NY LÄNK OCH SIDA */
</pre>
	
Uppmärksamma hur denna länk skiljer sig mot de andra! Inget slash före page. Nummret ifrån contentslistan är viktig och får ej vara fel. Samt viktigt att type är page.<br>
Denna nya länk kommer att länka till controllern page, anropa metoden view med parameter 9 och läsa in sidan.

Editera designen
-----------------
Navigera till: `site/config.php` och öppna den i en texteditor. <b>Rad 139</b> är intressant.
Här kan du sedan editera en hel massa saker som rör designen på hemsidan så som, logotype, favicon, slogan, navigeringsmeny, header och footer.
Låt dessa default inställningar vara om du ej vet vad du gör !
För att ändra till exempel logo, ladda upp logotypen till mappen `site/themes/mytheme/`.<br>
Detta gör filen åtkomstbar via sökvägarna(OBS kan behöva ändra filrättighet på bilden till 666.)
Gå sen ner i arrayen $tg->config['theme'], till rad <b>92</b>. Skriv in din valda bilds namn.<br>
För att ändringarna ska fungera, ladda upp den sparade filen till server igen.


<b>site/config.php:</b>
<pre>
$tg->config['theme'] = array(
  'name'			=> 'mytheme',
  'path'            => 'site/themes/mytheme',
  'parent'          => 'themes/grid',
  'stylesheet'      => 'style.css',
  'template_file'   => 'index.tpl.php',
  'regions' => array('flash','featured-first','featured-middle','featured-last',
	'primary','sidebar','triptych-first','triptych-middle','triptych-last',
	'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
	'footer',
  ),
  'menu_to_region' => array('my-navbar'=>'navbar'),
  'data' => array(
	'header' => 'TripleGem',
	'slogan' => 'A PHP-based MVC-inspired CMF',
	'favicon' => 'logo_80x80.png',
	'logo' => 'logo_80x80.png',
	'logo_width'  => 80,
	'logo_height' => 80,
	'footer' => '<p>TripleGem &copy; by Per Sjölin</p>',
  ),
);
</pre>

CSS
----------------------------

För att ändra färg och font vänligen navigera till site/themes/mytheme/style.css och öppna den i valfri texteditor.
<b>site/themes/mythemes/style.css:</b>
<pre>
/**
* Description: Sample theme for site which extends the TripleGem grid-theme.
*/
@import url(../../../themes/grid/style.css);
@import url(http://fonts.googleapis.com/css?family=Exo+2);

html{background-color:#222;}
body{background-color:#444; font-family: 'Exo 2', sans-serif;}
#outer-wrap-header{background-color:#444;border-bottom:1px solid #CFC}
#outer-wrap-footer{background-color:#222}
p{	
	color:#EEE;
}
a{	
	color:#CFC;
}
h1,h2,h3,h4,h5,h6{
	color:#EEE;
}
li{
	color:#EEE;
}
code{
	color:#EEE;
}
#site-slogan {
	color:#FFF;
}
</pre>

Ändringar i `site/themes/mythemes/style.css` påverkar som sagt färg och font.<br> <b>Övrig css</b> ska skrivas i en annan fil: <b>themes/grid/style.ccs</b>
Bifogar ej denna fil pågrund utav att den är lång. Dock så bör en van css användare känna ganska väl igen sig. I denna går det att editera storlekar, placeringar med mera.