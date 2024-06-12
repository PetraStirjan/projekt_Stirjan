-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 07:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projektmmanews`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `about` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `archive` tinyint(1) DEFAULT 0,
  `photo` varchar(255) DEFAULT NULL,
  `upload_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `about`, `content`, `category`, `archive`, `photo`, `upload_date`) VALUES
(4, 'POSLJEDNJA BORBA DODANA NA BORBENU KARTU KSW 95', 'U uvodnom dvoboju gala večeri KSW 95, spektakularno borbeni Jacek Gać (2-1, 2 KO) vratit će se u okrugli kavez i dočekati Morgana Gboloua (4-2, 1 KO, 2 Sub), kojem je ovo debi u njemu. Dvoboj u velter kategoriji održat će se 7. lipnja u dvorani Urania u Olsztynu.', 'U uvodnom dvoboju gala večeri KSW 95, spektakularno borbeni Jacek Gać (2-1, 2 KO) vratit će se u okrugli kavez i dočekati Morgana Gboloua (4-2, 1 KO, 2 Sub), kojem je ovo debi u njemu. Dvoboj u velter kategoriji održat će se 7. lipnja u dvorani Urania u Olsztynu.\r\n\r\nPosljednje ulaznice u prodaji za eBilet.pl\r\n\r\nJacek Gać u svijet MMA-a ušao je iz upečatljivih sportova. Do sada je pobijedio u dvije borbe u kavezima, a obje su završile nokautom u prvoj rundi. Debitirao je u KSW-u u studenom prošle godine, ali je morao prihvatiti superiornost Michała Gniadyja. Gać iza sebe ima mnogo borbi u amaterskom boksu i kickboxingu. Osvajač je medalje poljskog K-1 kupa i profesionalni prvak organizacije KKM. Također je osvajač medalja amaterskih MMA natjecanja. Popularna \"Siexa\" svakodnevno trenira u Unigue Fight Clubu s Arkadiuszom Wrzošekom i Radosławom Paczuskim, poznatim iz KSW-a.\r\n\r\nMorgan Gbolou natječe se u profesionalnom MMA -u od 2018. godine. Do danas je vodio šest borbi, pobijedio u četiri, a tri puta završio svoje protivnike nokautom ili pokornošću. Francuski internacionalac do sada je stekao iskustvo kod kuće, kao i u Nizozemskoj i Švicarskoj. Gbolou se posljednji put borio u travnju ove godine i dodao još jednu pobjedu svom rekordu na gala večeri Lige borbe na razini. Ući će u KSW kavez nakon dva trijumfa zaredom.', 'news', 1, 'uploads/ksw.PNG', '2024-05-02'),
(5, 'DANA WHITE NAJAVIO KLJUČNE BORBE ZA UFC 304 U MANCHESTERU', 'Leon Edwards, Tom Aspinall i drugi predviđeni za događaj u Velikoj Britaniji 27. srpnja', 'Izvršni direktor UFC-a jutros je olujno zahvatio društvene mreže s nekoliko ključnih najava za UFC 304 događaj koji se dogodio 27. srpnja u Manchesteru u Engleskoj.\r\n\r\nGlavni događaj bit će okršaj za titulu u velter kategoriji dok prvak Leon Edwards vozi svoj niz od 13 borbi bez poraza u oktogonu gdje se sastaje s Belalom Muhammadom usred niza od 10 pobjeda.\r\n\r\nPrivremeni prvak teške kategorije Tom Aspinall bit će na domaćem terenu u su-glavnoj borbi gdje će se prije dvije godine suočiti s Curtisom Blaydesom u revanšu iz UFC Londona.\r\n\r\nOmiljeni laki navijači Bobby Green i Paddy Pimblett također bi se trebali sastati u Co-op Live areni, kao i muha kategorije Manel Kape i Muhammad Mokaev.', 'news', 0, 'uploads/ufc1.jpg', '2024-06-03'),
(6, 'Hrvatski MMA borac Luka Miklečić ostvario je impresivnu pobjedu na ARMMADA8', '<p>Hrvatski MMA borac Luka Miklečić ostvario je impresivnu pobjedu na ARMMADA8, prestižnom MMA događaju održanom u Novom Sadu.</p>', ' <p>Hrvatski MMA borac Luka Miklečić ostvario je impresivnu pobjedu na ARMMADA8, prestižnom MMA događaju održanom u Novom Sadu. U dinamičnoj borbi koja je oduševila publiku, Miklečić je pokazao svoju superiornu tehniku i snagu, pobijedivši svog protivnika jednoglasnom odlukom sudaca.</p>\r\n        <p>Ova pobjeda dodatno učvršćuje Miklečićevu reputaciju u MMA zajednici kao jednog od najperspektivnijih boraca iz Hrvatske.</p>\r\n        <p class=\"quote\">\"Pripremao sam se naporno za ovu borbu i zahvalan sam svom timu na podršci. \" izjavio je Miklečić nakon borbe.</p>\r\n        <p>Luka Miklečić svojom je pobjedom definitivno postavio visoke standarde i najavio uzbudljive izazove u nastavku karijere.</p>\r\n  ', 'news', 0, 'uploads/armmada8.jpeg', '2024-06-04'),
(7, 'Conor McGregor: MMA Legenda', 'McGregor je eksplodirao na MMA sceni sa svojim eksplozivnim stilom borbe i neoborivim samopouzdanjem.', ' <p>Conor McGregor stoji kao veliki lik u svijetu mješovitih borilačkih vještina (MMA), njegovo ime sinonim je i za vještinu i za showmanship. Rođen 14. srpnja 1988. u Dublinu, Irska, put Conora McGregora do postajanja legende ovog sporta je ništa manje nego nevjerojatan.</p>\r\n        \r\n        <p>McGregor je eksplodirao na MMA sceni sa svojim eksplozivnim stilom borbe i neoborivim samopouzdanjem. Njegovo precizno udaranje i moć nokauta brzo su mu donijeli reputaciju jednog od najozbiljnijih boraca u UFC-u.</p>\r\n        \r\n        <p>Jedan od najikonografskijih trenutaka McGregora dogodio se u prosincu 2015. kada je pobijedio Josea Alda za samo 13 sekundi i osvojio UFC-ovu perolaku titulu. Ova iznenađujuća pobjeda utvrdila je McGregorov status kao transcendentalnog talenta i lansirala ga na neviđene visine slave i bogatstva.</p>\r\n        \r\n        <p>Izvan oktogona, McGregorova osobnost veća od života i bahato ponašanje pomogli su mu da transcendiraju sport. Postao je globalna superzvijezda, privlačeći obožavatelje iz svih krajeva svijeta i privlačeći neviđenu pažnju na MMA.</p>\r\n        \r\n        <p>Unatoč suočavanju s preprekama i izazovima tijekom svoje karijere, uključujući poraze u visokoprofilnim borbama, McGregorova otpornost i odlučnost nikada nisu posustale. Njegova sposobnost da se oporavi od protivština samo je doprinijela njegovoj legendi.</p>\r\n        \r\n        <p class=\"quote\">\"Nismo ovdje samo da sudjelujemo. Mi smo ovdje da preuzmemo.\" - Conor McGregor</p>\r\n        \r\n        <p>McGregorov utjecaj na MMA proteže se daleko izvan njegovih postignuća unutar kaveza. On je utabao put za buduće generacije boraca, pokazujući potencijal sportaša da postanu globalne ikone putem vještine, karizme i vjere u sebe.</p>\r\n        \r\n        <p>Dok McGregoreva karijera nastavlja napredovati, njegov status kao legende MMA-a je osiguran. Bez obzira nalazi li se u oktogonu ili se bavi drugim područjima izvan borbe, McGregor ostaje jedan od najutjecajnijih likova u povijesti ovog sporta.</p>\r\n    ', 'legends', 0, 'uploads/McGregor.jpg', '2024-06-05'),
(8, 'Anderson Silva: Osvajač Oktogona', 'Anderson Silva, poznat i kao \"The Spider\", je jedan od najvećih boraca u povijesti mješovitih borilačkih vještina (MMA)', ' <p>Anderson Silva, poznat i kao \"The Spider\", je jedan od najvećih boraca u povijesti mješovitih borilačkih vještina (MMA). Rođen 14. travnja 1975. u Sao Paulu, Brazil, Silva je postao ikona sporta zbog svoje nevjerojatne tehnike, inteligencije u borbi i izvanredne karijere.</p>\r\n        \r\n        <p>Silva je započeo svoju profesionalnu MMA karijeru 1997. godine, a ubrzo je postao poznat po svojoj nevjerojatnoj vještini u stand-up borbi. Njegov stil borbe, koji se temeljio na preciznosti, brzini i nekonvencionalnim pokretima, bio je nevjerojatno težak za protivnike.</p>\r\n        \r\n        <p>Jedan od najvećih trenutaka u karijeri Andersona Silve bio je njegov pobjednički niz od 16 uzastopnih borbi u UFC-u, tijekom kojeg je obranio svoj naslov srednje kategorije. Ovaj niz obuhvatio je neke od najimpresivnijih pobjeda u povijesti sporta.</p>\r\n        \r\n        <p>Njegova tehnika borbe bila je gotovo bez greške, a neki od njegovih najpoznatijih trenutaka uključuju nokautiranje Vitora Belforta, te nevjerojatan povratak u borbi protiv Chaela Sonnena.</p>\r\n        \r\n        <p class=\"quote\">\"Svaka borba je drugačija. Morate biti spremni na sve.\" - Anderson Silva</p>\r\n        \r\n        <p>Izvan oktogona, Silva je bio poznat po svojoj poniznosti i poštovanju prema protivnicima. Njegova karizma i profesionalnost privukli su obožavatelje diljem svijeta, čineći ga jednim od najomiljenijih boraca u povijesti sporta.</p>\r\n        \r\n        <p>Unatoč tome što je kraj karijere blizu, Anderson Silva će ostati urezan u sjećanju kao jedna od najvećih legendi MMA-a. Njegov doprinos sportu je neizbrisiv, a njegova ostavština će živjeti kroz generacije boraca koji dolaze.</p>\r\n   ', 'legends', 0, 'uploads/Silva.jpg', '2024-06-05'),
(9, 'Jon Jones: Majstor oktogona - Čovjek koji je srušio sve granice', 'Jon Jones, poznat i kao \"Bones\", neupitno je jedan od najvećih boraca u povijesti mješovitih borilačkih vještina (MMA).', '    <p>Jon Jones, poznat i kao \"Bones\", neupitno je jedan od najvećih boraca u povijesti mješovitih borilačkih vještina (MMA). Rođen 19. srpnja 1987. u Rochesteru, New York, Jones je stvorio legendaran status zbog svoje nevjerojatne tehnike, taktičke genijalnosti i izvanredne karijere.</p>\r\n        \r\n        <p>Jones je započeo svoju profesionalnu MMA karijeru 2008. godine, a brzo je pokazao svoj izvanredan talent i potencijal. Njegova izvanredna atletska sposobnost, kombinirana s nevjerojatnim repertoarom tehnika borbe, činila ga je nepobjedivim protivnikom u svojoj kategoriji.</p>\r\n        \r\n        <p>Jedan od najimpresivnijih aspekata Jonesove karijere je njegova sposobnost prilagodbe i dominacije protiv svih stilova borbe. Bez obzira na to je li se borio u stojećem ili na tlu, Jones je uvijek bio korak ispred svojih protivnika.</p>\r\n        \r\n        <p>Jonesova karijera obilježena je nizom spektakularnih pobjeda protiv nekih od najvećih imena u sportu. Njegova sposobnost da se izbori s najtežim izazovima i preokrene situaciju u svoju korist, čini ga istinskom legendom MMA-a.</p>\r\n        \r\n        <p class=\"quote\">\"Svaki izazov je prilika za rast.\" - Jon Jones</p>\r\n        \r\n        <p>Izvan oktogona, Jones je poznat po svojoj posvećenosti i disciplini. Njegova predanost treninzima i kontinuiranoj evoluciji njegovih vještina pomogla mu je da ostane na vrhu sporta tijekom godina.</p>\r\n        \r\n        <p>Unatoč kontroverzama koje su pratile njegovu karijeru, Jon Jones ostaje jedan od najdominantnijih i najutjecajnijih boraca u povijesti MMA-a. Njegova nasljedstva će ostati urezana u sjećanje kao jedno od najsvjetlijih poglavlja u svijetu borilačkih vještina.</p>\r\n    ', 'legends', 0, 'uploads/jones.jpg', '2024-06-05'),
(23, 'Results | UFC LOUISVILLE', 'Pogledajte rezultate borbe, gledajte intervjue nakon borbe s \r\npobjednicima glavnih karata.', '<p>Dok su stvari započele još jednim odlaskom na bodovne liste, \r\nPunahele Soriano dominirao je posljednja dva kadra svog debija \r\nu velter kategoriji prije nego što su prekidi počeli padati u \r\nizobilju. Poluteškaši Zachary Reese i Brunno Ferreira probijali \r\nsu se do uzastopnih plasmana u prvu rundu prije nego što je \r\nperspektiva bantam kategorije Raul Rosas Jr. sakupio svoju \r\ndrugu uzastopnu stopersku pobjedu i treću pobjedu u UFC-u.</p>\r\n\r\n\r\n<li><strong>Glavni događaj:</strong> Nassourdine Imavov pobijedio Jareda Cannoniera od TKO-a (udarci) u 1:34 4. kola</li>\r\n<li><strong>Glavni događaj:</strong> Dominick Reyes pobijedio Dustina Jacobyja od KO (štrajkovi) u 2:00 1. kola</li>\r\n<li>Raul Rosas Jr. pobijedio Rickyja Turciosa predajom (stražnji goli gušenje) u 2:22 2. runde</li>\r\n<li>Brunno Ferreira pobijedio Dustina Stoltzfusa od TKO-a (okretanje lakta) na 4:51 1. kola</li>\r\n<li>Zachary Reese pobijedio Juliana Marqueza TKO-om (aperkat) u 0:20 1. kola</li>\r\n<li>Punahele Soriano pobijedio Miguela Baezu jednoglasnom odlukom sudaca (30-25, 30-25, 30-27)</li>\r\n<li>Ludovit Klein jednoglasnom odlukom sudaca pobijedio Thiaga Moisésa (30-27, 30-27, 30-27)</li>\r\n<li>Carlos Prates pobijedio Charlesa Radtkea od TKO-a (koljeno u jetru) u 4:47 1. kola</li>\r\n<li>Brad Katona pobijedio Jesseja Butlera jednoglasnom odlukom sudaca (30-26, 30-27, 30-27)</li>\r\n<li>Montana De La Rosa (29-28, 29-28) pobijedila Andreu Lee podijeljenom odlukom (29-28)</li>\r\n<li>Daniel Marcos pobijedio Johna Castañedu jednoglasnom odlukom (30-27, 30-27, 30-27)</li>\r\n<li>Denise Gomes (30-27, 30-27) podijeljenom odlukom svladala Eduardu Mouru (29-28)</li>\r\n<li>Taylor Lapilus pobijedio Codyja Stamanna jednoglasnom odlukom (30-27, 30-27, 30-27)</li>\r\n<li>Puja Tomar (30-27, 29-28) podijeljenom odlukom sudaca (30-27) pobijedila Rayanne dos Santos</li>\r\n    ', 'news', 0, 'uploads/ufc.jpg', '2024-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `korisnicko_ime` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Petra', 'Stirjan', 'petrastirjan', '$2y$10$rSyEuo57./SA.f5CqW8KFuhgsq.3Ur1Bksqto45dJSsi32/miN6Me', 1),
(2, 'Pero', 'Peric', 'peroperic', '$2y$10$/tpj8ogHzPHbYoEn1.9YVOY9N.ksvhRiAM3PluyKvHwxbtyYLOoQW', 0),
(3, 'Marko', 'Markić', 'markomarkic', '$2y$10$rdR9BcYLcJ3dehnx.BuKn.ACoKwxcLr/4Ap46SMEqamf9KVB7.HQO', 0),
(6, 'Ivan', 'Ivanić', 'ivanivanic', '$2y$10$Rh.TIXxQzIxFr5593rYAHu3d07ccW3s0BmahvczRliC984vLHlq8.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
