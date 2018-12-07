<?php

?>
<!doctype html>
<html lang="nl">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta htta-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/src/img/brand/detijd/favicon.ico">
	<meta name="theme-color" content="white">
	<meta name="msapplication-navbutton-color" content="white">
	<meta name="apple-mobile-web-app-status-bar-style" content="white">
	<link rel="dns-prefetch" href="google-analytics.com">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.typekit.net/mjv5pmk.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
	<?php if ( false ) { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-sdfsdf-21"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		//gtag('config', 'UA-74211934-21');
	</script>

	<?php } ?>

</head>

<body class="<?php 
	if(is_home()){
		echo " home"; } else if(is_page_template("templates/tpl-about.php")){ echo
 "about-page" ; } else if(is_page_template("templates/tpl-nieuws.php")){ echo "nieuws-page" ; } else
 if(is_page_template("templates/tpl-contact.php")){ echo "contact-page" ; } else if(is_page_template("templates/tpl-home.php")){
 echo "home-page" ; } else if(is_page_template("templates/tpl-inspiratie.php")){ echo "inspiratie-page" ; } else { echo
 get_post_type().(is_single()?"_single":"") ; } ?>">

	<?php
	if(get_post_type() == 'cpt_projects' && !is_single()){
		?>
	<header class="header-container white">
		<div class="row header-container-inner">
			<div class="header-item header-contact"><a href="<?php echo get_page_link(72); ?>">Contact</a></div>
			<div class="header-item header-logo"><svg height="27" viewBox="0 0 135 27" width="135" xmlns="http://www.w3.org/2000/svg">
					<g fill="white" fill-rule="evenodd">
						<path d="m4.19317143 20.3215663c.12276428 1.2166265.58856428 2.0683132 1.39800714 2.5546988.80932143.4871084 1.77771429.73 2.90590714.73.39209286 0 .83967858-.030482 1.34251429-.0914458.5025929-.060482.9748286-.1759036 1.4163429-.346747.44115-.1696386.8030071-.4195181 1.0852071-.7480723.2812286-.3286747.4100643-.7601205.3861429-1.2957831-.0247715-.5349398-.2208786-.9726506-.5886858-1.3138555-.3678071-.3404819-.8404071-.6140963-1.4162214-.8213253-.5763-.2063855-1.23225713-.3831325-1.96787141-.5290361-.73573572-.1459036-1.4841-.3040964-2.24363572-.4745783-.7854-.17-1.53935-.376747-2.26233571-.620241-.72371429-.2428915-1.3736-.5714458-1.94953572-.9854217-.57666428-.4134939-1.03651428-.9426506-1.37955-1.5878313-.34352143-.6442169-.51497857-1.4416867-.51497857-2.390241 0-1.0221686.25111429-1.879759.75407143-2.57337345.50247143-.69349397 1.14045714-1.2526506 1.91274286-1.67879518.77240714-.42554217 1.63078571-.72361446 2.57477143-.89409638.94410714-.17 1.84522857-.25542169 2.70397142-.25542169.98029286 0 1.91844999.10361446 2.81386429.31.89505.20722892 1.7040071.54168675 2.4277214 1.0039759.7229857.46216868 1.3243 1.06433735 1.8024857 1.8066265.4781858.7421687.7782358 1.636506.901 2.6824096h-4.3772571c-.19635-.9977108-.6563214-1.666265-1.3791857-2.0074698-.7237143-.340482-1.55149287-.5109639-2.48309287-.5109639-.29422143 0-.64369286.0245783-1.04817143.073253-.40484286.0490362-.7854.1398795-1.14045714.2736145-.35590715.1339759-.65644286.3285542-.90112143.5839759-.24540714.2554217-.36780714.5898795-.36780714 1.0036144 0 .5108434.17740714.9246988.53319285 1.2407229.35517857.316747.82134286.5784338 1.39800715.7849398.57581428.2066265 1.23213571.383012 1.96787142.5289157.73561429.1463855 1.49563572.3048192 2.28067139.4745783.7595358.1708433 1.5080215.3774699 2.2436358.6203614.7356142.2436145 1.3915714.5720482 1.9682357.9857831.5758143.4138555 1.0417357.9366266 1.3975214 1.5692772.3550571.633012.5335571 1.4112048.5335571 2.3356626 0 1.1193976-.2577928 2.0683133-.77265 2.846988-.5148571.7789156-1.1832 1.4112048-2.0045428 1.8974698-.8220714.4871085-1.7354572.8397591-2.7405214 1.0589157-1.0057929.2189157-1.99883576.3280723-2.97961433.3280723-1.20153571 0-2.31139286-.1336145-3.32884286-.4016868-1.01769285-.2672289-1.90084285-.6749397-2.64847857-1.2221686-.74836428-.5475904-1.33692857-1.2284338-1.76581428-2.0438555-.42912857-.8149397-.6562-1.7820481-.68024286-2.9014457z" />
						<path d="m19 8.11493588h3.1222791v-7.11493588h4.1382722v7.11493588h3.7394487v3.07527652h-3.7394487v9.9851542c0 .4338827.0180956.8081707.0546464 1.1214309.0361913.313499.1207975.5787491.2540582.795989.1326615.2171205.3324327.3796623.5989541.4882226.2659223.1086797.6289139.1627806 1.0890947.1627806.2902495 0 .5808585-.0054937.871108-.0181531.290609-.0117039.5808585-.0541009.8715873-.1264744v3.1837173c-.4601808.0477713-.9077786.095662-1.3435124.1442693-.4353742.0484878-.883691.0728512-1.343033.0728512-1.0890946 0-1.9665541-.1030665-2.6320187-.3076471-.6658242-.2046999-1.1861641-.5063756-1.5608999-.9045493-.3755747-.3979348-.6297527-.8981001-.7622944-1.5012126-.1332607-.6027542-.2123542-1.2899442-.2359625-2.0624059v-11.0339727h-3.1222791z" />
						<path d="m49 26.4728106h-3.947153v-2.7119171h-.0702688c-.4936268.9792792-1.2281919 1.7648412-2.2026481 2.3540748-.9755034.5899797-1.9681086.8850317-2.9780483.8850317-2.3965855 0-4.129689-.633622-5.19838-1.901985-1.0692727-1.2677414-1.6035018-3.1826575-1.6035018-5.7437537v-12.3542613h4.0177708v11.9397214c0 1.7080191.3050411 2.9130945.9162867 3.6157236.6105476.7034995 1.4680831 1.0550006 2.5726065 1.0550006.8457853 0 1.5505676-.1380142 2.1144632-.4144157.5638956-.2761527 1.0221553-.6463044 1.3745464-1.1109522.3523912-.4643992.6047307-1.0231702.7578329-1.6763132.1524043-.6526456.2290717-1.3560207.2290717-2.109255v-11.2995095h4.0174218z" />
						<path d="m57.2303075 17.4643087c0 .7857888.1048634 1.5596699.3155702 2.3215254.2099719.7622093.5315448 1.4408289.9649639 2.0356233.4325616.5955017.9833395 1.0713372 1.6511087 1.4284496.6682592.3572304 1.4593899.5359634 2.3752297.5359634.939973 0 1.7497243-.1904049 2.430724-.5715685.6798971-.380692 1.2366776-.8805786 1.6697292-1.5000136.4325616-.6187276.7546245-1.3151499.9648414-2.0893847.2099718-.7730558.3155702-1.5650931.3155702-2.3749331 0-2.0472951-.476663-3.6429238-1.4287639-4.7854713-.952836-1.1430191-2.245008-1.7144697-3.8781085-1.7144697-.9898322 0-1.8244518.1965356-2.5047164.5892531-.6806322.3927176-1.2374128.9051014-1.6699743 1.5357367-.4330516.6311069-.7422516 1.3453317-.9276002 2.1427923-.185716.7981681-.278574 1.6134313-.278574 2.4464971zm14.7696925 9.0358047h-4.0078403v-2.4999048h-.0741149c-.5696435 1.0713372-1.3978929 1.8394413-2.4865858 2.3037228s-2.2392503.6960686-3.4510596.6960686c-1.5092491 0-2.8267794-.2557203-3.952101-.7681041-1.1260566-.5114406-2.0595369-1.2079808-2.8017885-2.089031-.7421292-.8805786-1.2989098-1.9224414-1.6700968-3.1249989-.3710646-1.2019679-.5564131-2.493774-.5564131-3.8751825 0-1.6660137.2348401-3.1068426.7048879-4.3210719.4699253-1.2145831 1.0946956-2.2143564 1.8741884-3.00014513.7792478-.78590668 1.6697293-1.36278058 2.6720569-1.73227226 1.0018375-.36878429 2.0221732-.55329433 3.061497-.55329433.5937768 0 1.1996815.0534077 1.8183266.16057679.6180325.10716909 1.2118093.28000726 1.7810853.5176892.5689085.23827144 1.0948181.54209405 1.5772388.91076044.4824207.36949168.8844787.80370925 1.2060517 1.30359589h.0743599v-9.4285222h4.2303075z" />
						<path d="m77 27h4v-18.82628878h-4zm0-22.06712284h4v-3.93287716h-4z" />
						<path d="m94.4998798 23.6973966c.9219557 0 1.7227942-.1956461 2.4021553-.5873017.6792408-.3911711 1.2378453-.9048179 1.6744915-1.5413038.4367664-.635759.7581833-1.3514725.9644908-2.1468981.2058269-.7944565.3095214-1.6081748.3095214-2.4404279 0-.8070554-.1036945-1.6144742-.3095214-2.4220141-.2063075-.8070554-.5277244-1.5226477-.9644908-2.146777-.4366462-.6237659-.9952507-1.1311132-1.6744915-1.5227689-.6793611-.391171-1.4801996-.5871806-2.4021553-.5871806-.9224362 0-1.7232748.1960096-2.4022753.5871806-.6794812.3916557-1.2374849.899003-1.6743714 1.5227689-.4366463.6241293-.7586639 1.3397216-.964611 2.146777-.2061874.8075399-.3090407 1.6149587-.3090407 2.4220141 0 .8322531.1028533 1.6459714.3090407 2.4404279.2059471.7954256.5279647 1.5111391.964611 2.1468981.4368865.6364859.9948902 1.1501327 1.6743714 1.5413038.6790005.3916556 1.4798391.5873017 2.4022753.5873017m0 3.3026034c-1.5047113 0-2.8451697-.2508874-4.0218557-.7518141-1.1774069-.5017748-2.1720568-1.1931385-2.9847908-2.0737277-.8134549-.8807104-1.4320171-1.9323537-1.8565276-3.1558991-.4246307-1.2234242-.6367057-2.5690818-.6367057-4.037094 0-1.4431778.212075-2.7761154.6367057-3.9999031.4245105-1.2229396 1.0430727-2.2753098 1.8565276-3.15589904.812734-.88071039 1.8073839-1.57158952 2.9847908-2.07336427 1.176686-.50141132 2.5171444-.75229869 4.0218557-.75229869 1.5043509 0 2.8446892.25088737 4.0222162.75229869 1.176686.50177475 2.171096 1.19265388 2.984551 2.07336427.812734.88058924 1.431536 1.93295944 1.856287 3.15589904.42427 1.2237877.637066 2.5567253.637066 3.9999031 0 1.4680122-.212796 2.8136698-.637066 4.037094-.424751 1.2235454-1.043553 2.2751887-1.856287 3.1558991-.813455.8805892-1.807865 1.5719529-2.984551 2.0737277-1.177527.5009267-2.5178653.7518141-4.0222162.7518141" />
						<path d="m107 27h5v-5h-5z" />
						<path d="m118 1h4.046057v14.7841417l7.310786-7.61043048h4.968912l-7.027146 6.91886818 7.701391 11.9074206h-4.932944l-5.607893-9.1398493-2.413106 2.4032179v6.7366314h-4.046057z" />
						<path d="m33 3h17v-3h-17z" />
					</g>
				</svg></div>
			<div class="header-item header-menu-icon"><svg height="30" viewBox="0 0 30 30" width="30" xmlns="http://www.w3.org/2000/svg">
					<g fill="white" fill-rule="evenodd">
						<rect fill="none" height="29" rx="14.5" stroke="white" width="29" x=".5" y=".5" />
						<path d="m8 12h14v1h-14zm0 5h14v1h-14z" fill="white" />
					</g>
				</svg></div>
		</div>
		<?php
	}
	else{
?>
		<header class="header-container">
			<div class="row header-container-inner">
				<div class="header-item header-contact"><a href="<?php echo get_page_link(72); ?>">Contact</a></div>
				<div class="header-item header-logo"><svg height="27" viewBox="0 0 135 27" width="135" xmlns="http://www.w3.org/2000/svg">
						<g fill="#222120" fill-rule="evenodd">
							<path d="m4.19317143 20.3215663c.12276428 1.2166265.58856428 2.0683132 1.39800714 2.5546988.80932143.4871084 1.77771429.73 2.90590714.73.39209286 0 .83967858-.030482 1.34251429-.0914458.5025929-.060482.9748286-.1759036 1.4163429-.346747.44115-.1696386.8030071-.4195181 1.0852071-.7480723.2812286-.3286747.4100643-.7601205.3861429-1.2957831-.0247715-.5349398-.2208786-.9726506-.5886858-1.3138555-.3678071-.3404819-.8404071-.6140963-1.4162214-.8213253-.5763-.2063855-1.23225713-.3831325-1.96787141-.5290361-.73573572-.1459036-1.4841-.3040964-2.24363572-.4745783-.7854-.17-1.53935-.376747-2.26233571-.620241-.72371429-.2428915-1.3736-.5714458-1.94953572-.9854217-.57666428-.4134939-1.03651428-.9426506-1.37955-1.5878313-.34352143-.6442169-.51497857-1.4416867-.51497857-2.390241 0-1.0221686.25111429-1.879759.75407143-2.57337345.50247143-.69349397 1.14045714-1.2526506 1.91274286-1.67879518.77240714-.42554217 1.63078571-.72361446 2.57477143-.89409638.94410714-.17 1.84522857-.25542169 2.70397142-.25542169.98029286 0 1.91844999.10361446 2.81386429.31.89505.20722892 1.7040071.54168675 2.4277214 1.0039759.7229857.46216868 1.3243 1.06433735 1.8024857 1.8066265.4781858.7421687.7782358 1.636506.901 2.6824096h-4.3772571c-.19635-.9977108-.6563214-1.666265-1.3791857-2.0074698-.7237143-.340482-1.55149287-.5109639-2.48309287-.5109639-.29422143 0-.64369286.0245783-1.04817143.073253-.40484286.0490362-.7854.1398795-1.14045714.2736145-.35590715.1339759-.65644286.3285542-.90112143.5839759-.24540714.2554217-.36780714.5898795-.36780714 1.0036144 0 .5108434.17740714.9246988.53319285 1.2407229.35517857.316747.82134286.5784338 1.39800715.7849398.57581428.2066265 1.23213571.383012 1.96787142.5289157.73561429.1463855 1.49563572.3048192 2.28067139.4745783.7595358.1708433 1.5080215.3774699 2.2436358.6203614.7356142.2436145 1.3915714.5720482 1.9682357.9857831.5758143.4138555 1.0417357.9366266 1.3975214 1.5692772.3550571.633012.5335571 1.4112048.5335571 2.3356626 0 1.1193976-.2577928 2.0683133-.77265 2.846988-.5148571.7789156-1.1832 1.4112048-2.0045428 1.8974698-.8220714.4871085-1.7354572.8397591-2.7405214 1.0589157-1.0057929.2189157-1.99883576.3280723-2.97961433.3280723-1.20153571 0-2.31139286-.1336145-3.32884286-.4016868-1.01769285-.2672289-1.90084285-.6749397-2.64847857-1.2221686-.74836428-.5475904-1.33692857-1.2284338-1.76581428-2.0438555-.42912857-.8149397-.6562-1.7820481-.68024286-2.9014457z" />
							<path d="m19 8.11493588h3.1222791v-7.11493588h4.1382722v7.11493588h3.7394487v3.07527652h-3.7394487v9.9851542c0 .4338827.0180956.8081707.0546464 1.1214309.0361913.313499.1207975.5787491.2540582.795989.1326615.2171205.3324327.3796623.5989541.4882226.2659223.1086797.6289139.1627806 1.0890947.1627806.2902495 0 .5808585-.0054937.871108-.0181531.290609-.0117039.5808585-.0541009.8715873-.1264744v3.1837173c-.4601808.0477713-.9077786.095662-1.3435124.1442693-.4353742.0484878-.883691.0728512-1.343033.0728512-1.0890946 0-1.9665541-.1030665-2.6320187-.3076471-.6658242-.2046999-1.1861641-.5063756-1.5608999-.9045493-.3755747-.3979348-.6297527-.8981001-.7622944-1.5012126-.1332607-.6027542-.2123542-1.2899442-.2359625-2.0624059v-11.0339727h-3.1222791z" />
							<path d="m49 26.4728106h-3.947153v-2.7119171h-.0702688c-.4936268.9792792-1.2281919 1.7648412-2.2026481 2.3540748-.9755034.5899797-1.9681086.8850317-2.9780483.8850317-2.3965855 0-4.129689-.633622-5.19838-1.901985-1.0692727-1.2677414-1.6035018-3.1826575-1.6035018-5.7437537v-12.3542613h4.0177708v11.9397214c0 1.7080191.3050411 2.9130945.9162867 3.6157236.6105476.7034995 1.4680831 1.0550006 2.5726065 1.0550006.8457853 0 1.5505676-.1380142 2.1144632-.4144157.5638956-.2761527 1.0221553-.6463044 1.3745464-1.1109522.3523912-.4643992.6047307-1.0231702.7578329-1.6763132.1524043-.6526456.2290717-1.3560207.2290717-2.109255v-11.2995095h4.0174218z" />
							<path d="m57.2303075 17.4643087c0 .7857888.1048634 1.5596699.3155702 2.3215254.2099719.7622093.5315448 1.4408289.9649639 2.0356233.4325616.5955017.9833395 1.0713372 1.6511087 1.4284496.6682592.3572304 1.4593899.5359634 2.3752297.5359634.939973 0 1.7497243-.1904049 2.430724-.5715685.6798971-.380692 1.2366776-.8805786 1.6697292-1.5000136.4325616-.6187276.7546245-1.3151499.9648414-2.0893847.2099718-.7730558.3155702-1.5650931.3155702-2.3749331 0-2.0472951-.476663-3.6429238-1.4287639-4.7854713-.952836-1.1430191-2.245008-1.7144697-3.8781085-1.7144697-.9898322 0-1.8244518.1965356-2.5047164.5892531-.6806322.3927176-1.2374128.9051014-1.6699743 1.5357367-.4330516.6311069-.7422516 1.3453317-.9276002 2.1427923-.185716.7981681-.278574 1.6134313-.278574 2.4464971zm14.7696925 9.0358047h-4.0078403v-2.4999048h-.0741149c-.5696435 1.0713372-1.3978929 1.8394413-2.4865858 2.3037228s-2.2392503.6960686-3.4510596.6960686c-1.5092491 0-2.8267794-.2557203-3.952101-.7681041-1.1260566-.5114406-2.0595369-1.2079808-2.8017885-2.089031-.7421292-.8805786-1.2989098-1.9224414-1.6700968-3.1249989-.3710646-1.2019679-.5564131-2.493774-.5564131-3.8751825 0-1.6660137.2348401-3.1068426.7048879-4.3210719.4699253-1.2145831 1.0946956-2.2143564 1.8741884-3.00014513.7792478-.78590668 1.6697293-1.36278058 2.6720569-1.73227226 1.0018375-.36878429 2.0221732-.55329433 3.061497-.55329433.5937768 0 1.1996815.0534077 1.8183266.16057679.6180325.10716909 1.2118093.28000726 1.7810853.5176892.5689085.23827144 1.0948181.54209405 1.5772388.91076044.4824207.36949168.8844787.80370925 1.2060517 1.30359589h.0743599v-9.4285222h4.2303075z" />
							<path d="m77 27h4v-18.82628878h-4zm0-22.06712284h4v-3.93287716h-4z" />
							<path d="m94.4998798 23.6973966c.9219557 0 1.7227942-.1956461 2.4021553-.5873017.6792408-.3911711 1.2378453-.9048179 1.6744915-1.5413038.4367664-.635759.7581833-1.3514725.9644908-2.1468981.2058269-.7944565.3095214-1.6081748.3095214-2.4404279 0-.8070554-.1036945-1.6144742-.3095214-2.4220141-.2063075-.8070554-.5277244-1.5226477-.9644908-2.146777-.4366462-.6237659-.9952507-1.1311132-1.6744915-1.5227689-.6793611-.391171-1.4801996-.5871806-2.4021553-.5871806-.9224362 0-1.7232748.1960096-2.4022753.5871806-.6794812.3916557-1.2374849.899003-1.6743714 1.5227689-.4366463.6241293-.7586639 1.3397216-.964611 2.146777-.2061874.8075399-.3090407 1.6149587-.3090407 2.4220141 0 .8322531.1028533 1.6459714.3090407 2.4404279.2059471.7954256.5279647 1.5111391.964611 2.1468981.4368865.6364859.9948902 1.1501327 1.6743714 1.5413038.6790005.3916556 1.4798391.5873017 2.4022753.5873017m0 3.3026034c-1.5047113 0-2.8451697-.2508874-4.0218557-.7518141-1.1774069-.5017748-2.1720568-1.1931385-2.9847908-2.0737277-.8134549-.8807104-1.4320171-1.9323537-1.8565276-3.1558991-.4246307-1.2234242-.6367057-2.5690818-.6367057-4.037094 0-1.4431778.212075-2.7761154.6367057-3.9999031.4245105-1.2229396 1.0430727-2.2753098 1.8565276-3.15589904.812734-.88071039 1.8073839-1.57158952 2.9847908-2.07336427 1.176686-.50141132 2.5171444-.75229869 4.0218557-.75229869 1.5043509 0 2.8446892.25088737 4.0222162.75229869 1.176686.50177475 2.171096 1.19265388 2.984551 2.07336427.812734.88058924 1.431536 1.93295944 1.856287 3.15589904.42427 1.2237877.637066 2.5567253.637066 3.9999031 0 1.4680122-.212796 2.8136698-.637066 4.037094-.424751 1.2235454-1.043553 2.2751887-1.856287 3.1558991-.813455.8805892-1.807865 1.5719529-2.984551 2.0737277-1.177527.5009267-2.5178653.7518141-4.0222162.7518141" />
							<path d="m107 27h5v-5h-5z" />
							<path d="m118 1h4.046057v14.7841417l7.310786-7.61043048h4.968912l-7.027146 6.91886818 7.701391 11.9074206h-4.932944l-5.607893-9.1398493-2.413106 2.4032179v6.7366314h-4.046057z" />
							<path d="m33 3h17v-3h-17z" />
						</g>
					</svg></div>
				<div class="header-item header-menu-icon"><svg height="30" viewBox="0 0 30 30" width="30" xmlns="http://www.w3.org/2000/svg">
						<g fill="#222120" fill-rule="evenodd">
							<rect fill="none" height="29" rx="14.5" stroke="#222120" width="29" x=".5" y=".5" />
							<path d="m8 12h14v1h-14zm0 5h14v1h-14z" fill="#222120" />
						</g>
					</svg></div>
			</div>

			<?php }

?>

			<div class="side-menu closed">
				<div class="side-menu-inner">
					<div class="side-menu-header">
						<div class="side-menu-header-inner">
							<div class="language-switch-container">
								<div class="language-switch-container-inner">
									<a class="<?php if(ICL_LANGUAGE_CODE!='en'){echo " active";}?>" href='/'>NL</a>
									<a class="<?php if(ICL_LANGUAGE_CODE=='en'){echo " active";}?>" href='/en'>EN</a>
								</div>
							</div>
							<div class="close-container">
								<div class="close-text">
									<?php _e("Close", 'sluiten_label') ?>
								</div>
								<div class="close-icon">
									<svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
										<g fill="none" fill-rule="evenodd">
											<rect fill="none" height="19" rx="9.5" stroke="#222120" width="19" x=".5" y=".5" />
											<path d="m9.5 9.5v-3.5h1v3.5h3.5v1h-3.5v3.5h-1v-3.5h-3.5v-1z" fill="#222120" />
										</g>
									</svg>
								</div>
							</div>
						</div>
					</div>
					<div class="side-menu-items">
						<?php
				wp_nav_menu( array(
					'theme_location' => 'header_second',
					'container' => false,
					'depth' => 0,
					'menu_id' => 'side-menu-categories',
					'menu_class' => 'side-menu-categories',
					'items_wrap' => '<ul>%3$s</ul>',
					'walker' => new mint_walker()
				));
			?>
						<?php
				wp_nav_menu( array(
					'theme_location' => 'header',
					'container' => false,
					'depth' => 0,
					'menu_id' => 'side-menu-pages',
					'menu_class' => 'side-menu-pages',
					'items_wrap' => '<ul>%3$s</ul>',
					'walker' => new mint_walker()
				));
			?>
					</div>
				</div>
			</div>
			<div class="side-menu-overlay closed">

			</div>

		</header>
		<div class="content">