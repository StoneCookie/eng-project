<nav class="header__nav px-4 py-2">
	<a class="header__link <?php if(isset($_GET['type'])) echo 'header__link_active' ?>" href="/">НОВОСТИ</a>
	<a class="header__link <?php if($_GET['type'] == 'history') echo 'header__link_active' ?>" href="/?type=history">ИСТОРИЯ</a>
	<a class="header__link <?php if($_GET['type'] == 'art') echo 'header__link_active' ?>" href="/?type=art">ИСКУССТВО</a>
	<a class="header__link <?php if($_GET['type'] == 'tech') echo 'header__link_active' ?>" href="/?type=tech">ТЕХНОЛОГИИ</a>
	<a class="header__link <?php if($_GET['type'] == 'sport') echo 'header__link_active' ?>" href="/?type=sport">СПОРТ</a>
	<a class="header__link <?php if($_GET['type'] == 'mode') echo 'header__link_active' ?>" href="/?type=mode">МОДА</a>
	<a class="header__link <?php if($_GET['type'] == 'travel') echo 'header__link_active' ?>" href="/?type=travel">ПУТЕШЕСТВИЯ</a>
	<a class="header__link <?php if($_GET['type'] == 'politic') echo 'header__link_active' ?>" href="/?type=politic">ПОЛИТИКА</a>
	<a class="header__link <?php if($_GET['type'] == 'business') echo 'header__link_active' ?>" href="/?type=business">ЭКОНОМИКА</a>
	<a class="header__link <?php if($_GET['type'] == 'music') echo 'header__link_active' ?>" href="/?type=music">МУЗЫКА</a>
	<a class="header__link <?php if($_GET['type'] == 'film') echo 'header__link_active' ?>" href="/?type=film">КИНО</a>
</nav>