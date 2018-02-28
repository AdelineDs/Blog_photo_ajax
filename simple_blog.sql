-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Mar 20 Février 2018 à 20:58
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'blandine', '2006e4cf4d65f78ae1a5903f3bab3ff6663b641d', 'dec.blandine@gmail.com', '2017-10-05'),
(2, 'adeline', '802b26edda18421a65f513b79f74fd845db261d7', 'deca.adeline@gmail.com', '2017-10-05');

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `resume`, `contenu`, `auteur`, `statut`, `date_publication`) VALUES
(39, 'Bienvenue sur mon Blog', 'Nunc habitassé cursus ? platea molestié blandit eu arcu praesent volutpat ullamcorper pésuéré phaséllœs dictumst dolor nibh posuere rhoncus litora mattis risus dictumst vulputate grâvida du portitorsé tristiqué aptenté donéc ligula nullam vulputate l', '<p>Bienvenue sur mon petit blog r&eacute;alis&eacute; en PHP !</p>\r\n<p style="text-align: justify;">Dum haec in oriente aguntur, Arelate hiemem agens Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.</p>\r\n<p style="text-align: justify;"><br />Ut enim quisque sibi plurimum confidit et ut quisque maxime virtute et sapientia sic munitus est, ut nullo egeat suaque omnia in se ipso posita iudicet, ita in amicitiis expetendis colendisque maxime excellit. Quid enim? Africanus indigens mei? Minime hercule! ac ne ego quidem illius; sed ego admiratione quadam virtutis eius, ille vicissim opinione fortasse non nulla, quam de meis moribus habebat, me dilexit; auxit benevolentiam consuetudo. Sed quamquam utilitates multae et magnae consecutae sunt, non sunt tamen ab earum spe causae diligendi profectae.</p>\r\n<p style="text-align: justify;"><br />Ciliciam vero, quae Cydno amni exultat, Tarsus nobilitat, urbs perspicabilis hanc condidisse Perseus memoratur, Iovis filius et Danaes, vel certe ex Aethiopia profectus Sandan quidam nomine vir opulentus et nobilis et Anazarbus auctoris vocabulum referens, et Mopsuestia vatis illius domicilium Mopsi, quem a conmilitio Argonautarum cum aureo vellere direpto redirent, errore abstractum delatumque ad Africae litus mors repentina consumpsit, et ex eo cespite punico tecti manes eius heroici dolorum varietati medentur plerumque sospitales.</p>', 'Adeline', 'publie', '2017-11-22 18:44:15'),
(40, 'Mon billet 01', 'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem !', '<p>Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.</p>\r\n<p><br />Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.</p>\r\n<p><br />Huic Arabia est conserta, ex alio latere Nabataeis contigua; opima varietate conmerciorum castrisque oppleta validis et castellis, quae ad repellendos gentium vicinarum excursus sollicitudo pervigil veterum per oportunos saltus erexit et cautos. haec quoque civitates habet inter oppida quaedam ingentes Bostram et Gerasam atque Philadelphiam murorum firmitate cautissimas. hanc provinciae inposito nomine rectoreque adtributo obtemperare legibus nostris Traianus conpulit imperator incolarum tumore saepe contunso cum glorioso marte Mediam urgeret et Parthos.</p>\r\n<p>&nbsp;</p>', 'Blandine', 'publie', '2017-11-22 22:26:20'),
(41, 'Mon billet 02', 'Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates ', '<p><strong>Mensarum</strong> enim voragines et varias voluptatum inlecebras, ne longius progrediar, praetermitto illuc transiturus quod <em>quidam</em> per ampla spatia urbis subversasque silices sine periculi metu properantes equos velut publicos signatis quod dicitur calceis agitant, familiarium agmina tamquam praedatorios globos post terga trahentes ne Sannione quidem, ut ait comicus, domi relicto. quos imitatae matronae complures opertis capitibus et basternis per latera civitatis cuncta discurrunt.</p>\r\n<p><br />Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, <span style="text-decoration: underline;">fortunae saevientis</span> procellae tempestates alias rebus <em>infudere</em> communibus per multa illa et dira facinora Caesaris Galli, qui ex squalore imo miseriarum in aetatis adultae primitiis ad principale culmen insperato saltu provectus ultra terminos potestatis delatae <strong>procurrens</strong> asperitate nimia cuncta foedabat. propinquitate enim regiae stirpis gentilitateque etiam tum Constantini nominis efferebatur in fastus, si plus valuisset, ausurus hostilia in auctorem suae felicitatis, ut videbatur.<br /></p>', 'Adeline', 'publie', '2018-02-11 15:00:25'),
(42, 'Mon billet 03', 'Post emensos insuperabilis expeditionis eventus languentibus partium animis, quas periculorum varietas fregerat et laborum, nondum tubarum cessante clangore vel milite locato per stationes hibernas, fortunae saevientis procellae tempestates alias reb', '<p>Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.</p>\r\n<ul style="list-style-type: circle;">\r\n<li>Excitavit hic ardor milites per municipia plurima,</li>\r\n<li>Quis enim aut eum diligat quem metuat, aut eum a</li>\r\n<li>Nemo quaeso miretur, si post exsudatos labores</li>\r\n<li>Mensarum enim voragines et varias voluptatum</li>\r\n<li>Dumque ibi diu moratur commeatus opperiens, quorum<br /> </li>\r\n</ul>\r\n<p><br />Sed tamen haec cum ita tutius observentur, quidam vigore artuum inminuto rogati ad nuptias ubi aurum dextris manibus cavatis offertur, inpigre vel usque Spoletium pergunt. haec nobilium sunt instituta.</p>', 'Adeline', 'publie', '2018-02-11 15:01:05'),
(43, 'Billet 04', 'Sin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris', '<p><strong>Sed maximum est in amicitia parem esse inferiori.</strong> Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam <span style="text-decoration: underline;">Mummio anteposuit</span>, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.</p>\r\n<p><br /><strong>Omitto iuris dictionem in libera civitate contra leges senatusque consulta;</strong> caedes relinquo; libidines praetereo, quarum acerbissimum extat indicium et ad insignem memoriam turpitudinis et paene ad iustum odium imperii nostri, quod constat nobilissimas virgines se in puteos abiecisse et morte voluntaria necessariam turpitudinem depulisse. Nec haec idcirco omitto, quod non gravissima sint, sed quia nunc sine teste dico.</p>\r\n<p><br />Sin autem ad adulescentiam perduxissent, dirimi tamen interdum contentione vel uxoriae condicionis vel commodi alicuius, quod idem adipisci uterque non posset. Quod si qui longius in amicitia provecti essent, tamen saepe labefactari, si in honoris contentionem incidissent; pestem enim nullam maiorem esse amicitiis quam in plerisque pecuniae cupiditatem, in optimis quibusque honoris certamen et gloriae; ex quo inimicitias maximas saepe inter amicissimos exstitisse.</p>', 'Adeline', 'publie', '2018-02-11 22:28:10');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(25, 33, 'moi', 'mon commentaire', '2017-11-21 13:33:58'),
(27, 39, 'Moi', 'J''ai hâte de voir la suite.', '2017-11-21 13:51:13'),
(28, 40, 'Moi', '<strong>mon commentaire</strong>\r\n', '2017-11-21 13:53:18'),
(29, 40, 'pseudo modifié', 'mon commentaire', '2017-11-22 20:55:14'),
(30, 49, 'Mon pseudo', 'chouette photo', '2018-02-16 10:23:44'),
(31, 43, 'Justine', 'Super article !', '2018-02-17 18:09:20'),
(32, 43, 'Romain', 'Top !', '2018-02-17 20:26:00');

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `portfolio`
--

INSERT INTO `portfolio` (`id`, `titre`, `categorie`, `lien`) VALUES
(1, 'Photo 1', 'category1', './Contenu/img/DSC_0675%20(2).JPG'),
(2, 'Photo 2', 'category2', './Contenu/img/DSC_0759.JPG'),
(3, 'Photo 3', 'category1', './Contenu/img/DSC_0810.JPG'),
(4, 'Photo 4', 'category3', './Contenu/img/DSC_1050.JPG'),
(5, 'Photo 5', 'category1', './Contenu/img/DSC_0675%20(2).JPG'),
(6, 'Photo 6', 'category2', './Contenu/img/DSC_0759.JPG'),
(7, 'Photo 7', 'category1', './Contenu/img/DSC_0810.JPG'),
(8, 'Photo 8', 'category3', './Contenu/img/DSC_1050.JPG'),
(9, 'Photo 9', 'category1', './Contenu/img/DSC_0675%20(2).JPG'),
(10, 'Photo 10', 'category2', './Contenu/img/DSC_0759.JPG'),
(11, 'Photo 11', 'category1', './Contenu/img/DSC_0810.JPG'),
(12, 'Photo 12', 'category3', './Contenu/img/DSC_1050.JPG'),
(13, 'Photo 13', 'category1', './Contenu/img/DSC_0675%20(2).JPG'),
(14, 'Photo 14', 'category2', './Contenu/img/DSC_0759.JPG'),
(15, 'Photo 15', 'category1', './Contenu/img/DSC_0675%20(2).JPG'),
(16, 'Photo 16', 'category2', './Contenu/img/DSC_0759.JPG'),
(17, 'Photo 17', 'category1', './Contenu/img/DSC_0810.JPG'),
(18, 'Photo 18', 'category1', './Contenu/img/DSC_0675%20(2).JPG'),
(19, 'Photo 19', 'category2', './Contenu/img/DSC_0759.JPG');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `billets`
--
ALTER TABLE `billets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `billets`
--
ALTER TABLE `billets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
