-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 09:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `critic`
--

CREATE TABLE `critic` (
  `idCritic` int(10) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `critic`
--

INSERT INTO `critic` (`idCritic`, `first_name`, `last_name`) VALUES
(1, 'Jane', 'Janet'),
(2, 'John', 'Smith'),
(3, 'Katherine', 'Johnson'),
(4, 'Michael ', 'Knox');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(50) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`idGenre`, `name`) VALUES
(4, 'Action & Adventure'),
(7, 'Art House & International'),
(2, 'Comedy'),
(1, 'Drama'),
(8, 'Horror'),
(6, 'Mystery & Suspense'),
(9, 'Novi zanr'),
(3, 'Romance'),
(5, 'Science Fiction & Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `privileges` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `name`, `href`, `privileges`) VALUES
(1, 'Home', 'index.php', 0),
(2, 'Movies', 'movie.php', 0),
(3, 'Author', 'author.php', 0),
(4, 'Login', 'login.php', 1),
(5, 'Admin', 'admin.php', 2),
(6, 'Register', 'register.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `idMovie` int(100) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `runtime` int(50) DEFAULT NULL,
  `quote` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idStudio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`idMovie`, `title`, `release_date`, `runtime`, `quote`, `synopsis`, `cover`, `idStudio`) VALUES
(1, 'The Lovebirds', '2020-05-05', 100, 'If the breezily enjoyable The Lovebirds feels like a little less than the sum of its parts, it\'s still an enjoyable showcase for the talents of its well-matched stars.\r\n\r\n', 'A couple (Issa Rae & Kumail Nanjiani) experiences a defining moment in their relationship when they are unintentionally embroiled in a murder mystery. As their journey to clear their names takes them from one extreme-- and hilarious -- circumstance to the next, they must figure out how they, and their relationship, can survive the night.\r\n', 'assets/img/lovebirds.jpg', 1),
(2, 'Promising Young Woman', '2020-04-17', 113, 'A boldly provocative, timely thriller, Promising Young Woman is an auspicious feature debut for writer-director Emerald Fennell -- and a career highlight for Carey Mulligan.', 'Everyone said Cassie (Carey Mulligan) was a promising young woman... until a tragic event abruptly derailed her future. Now she\'s a medical school drop-out, living at home with her worried parents and working at a coffee shop with a concerned boss (Laverne Cox). It seems like she is at a standstill, except for the double life Cassie leads at night....\r\n', 'assets/img/promisingwoman.jpg', 2),
(3, 'Avengers: Endgame', '2019-04-26', 182, 'Exciting, entertaining, and emotionally impactful, Avengers: Endgame does whatever it takes to deliver a satisfying finale to Marvel\'s epic Infinity Saga.', 'The grave course of events set in motion by Thanos that wiped out half the universe and fractured the Avengers ranks compels the remaining Avengers to take one final stand in Marvel Studios\' grand conclusion to twenty-two films, \"Avengers: Endgame.\"\r\n', 'assets/img/endgame.jpg', 3),
(4, 'Parasite', '2019-09-11', 132, 'An urgent, brilliantly layered look at timely social themes, Parasite finds writer-director Bong Joon Ho in near-total command of his craft.', 'Bong Joon Ho brings his work home to Korea in this pitch-black modern fairytale. Meet the Park Family: the picture of aspirational wealth. And the Kim Family, rich in street smarts but not much else. Be it chance or fate, these two houses are brought together and the Kims sense a golden opportunity. Masterminded by college-aged Ki-woo, the Kim children expediently install themselves as tutor and art therapist, to the Parks. Soon, a symbiotic relationship forms between the two families. The Kims provide \"indispensable\" luxury services while the Parks obliviously bankroll their entire household. When a parasitic interloper threatens the Kims\' newfound comfort, a savage, underhanded battle for dominance breaks out, threatening to destroy the fragile ecosystem between the Kims and the Parks.', 'assets/img/parasite.jpg', 4),
(5, 'The Invisible Man', '2020-02-28', 110, 'Smart, well-acted, and above all scary, The Invisible Man proves that sometimes, the classic source material for a fresh reboot can be hiding in plain sight.', 'Trapped in a violent, controlling relationship with a wealthy and brilliant scientist, Cecilia Kass (Moss) escapes in the dead of night and disappears into hiding, aided by her sister (Harriet Dyer, NBC\'s The InBetween), their childhood friend (Aldis Hodge, Straight Outta Compton) and his teenage daughter (Storm Reid, HBO\'s Euphoria). But when Cecilia\'s abusive ex (Oliver Jackson-Cohen, Netflix\'s The Haunting of Hill House) commits suicide and leaves her a generous portion of his vast fortune, Cecilia suspects his death was a hoax. As a series of eerie coincidences turns lethal, threatening the lives of those she loves, Cecilia\'s sanity begins to unravel as she desperately tries to prove that she is being hunted by someone nobody can see.', 'assets/img/invisibleman.jpg', 8),
(6, 'Ready Or Not', '2019-08-22', 95, 'Smart, subversive, and darkly funny, Ready or Not is a crowd-pleasing horror film with giddily entertaining bite.', 'Ready Or Not follows a young bride (Samara Weaving) as she joins her new husband\'s (Mark O\'Brien) rich, eccentric family (Adam Brody, Henry Czerny, Andie MacDowell) in a time-honored tradition that turns into a lethal game with everyone fighting for their survival.', 'assets/img/readyornot.jpg', 10),
(7, 'Swallow', '2020-03-06', 94, 'Swallow\'s unconventional approach to exploring domestic ennui is elevated by a well-told story and Haley Bennett\'s powerful leading performance.', 'On the surface, Hunter (Haley Bennett) appears to have it all. A newly pregnant housewife, she seems content to spend her time tending to an immaculate home and doting on her Ken-doll husband, Richie (Austin Stowell). However, as the pressure to meet her controlling in-laws and husband\'s rigid expectations mounts, cracks begin to appear in her carefully created facade. Hunter develops a dangerous habit, and a dark secret from her past seeps out in the form of a disorder called pica -- a condition that has her compulsively swallowing inedible, and oftentimes life-threatening, objects. A provocative and squirm-inducing psychological thriller, SWALLOW follows one woman\'s unraveling as she struggles to reclaim independence in the face of an oppressive system by whatever means possible.', 'assets/img/swallow.jpg', 11),
(8, 'Little Women', '2019-12-25', 102, 'With a stellar cast and a smart, sensitive retelling of its classic source material, Greta Gerwig\'s Little Women proves some stories truly are timeless.', 'Writer-director Greta Gerwig (Lady Bird) has crafted a Little Women that draws on both the classic novel and the writings of Louisa May Alcott, and unfolds as the author\'s alter ego, Jo March, reflects back and forth on her fictional life. In Gerwig\'s take, the beloved story of the March sisters - four young women each determined to live life on her own terms -- is both timeless and timely. Portraying Jo, Meg, Amy, and Beth March, the film stars Saoirse Ronan, Emma Watson, Florence Pugh, Eliza Scanlen, with Timothée Chalamet as their neighbor Laurie, Laura Dern as Marmee, and Meryl Streep as Aunt March.', 'assets/img/littlewomen.jpg', 20),
(9, 'Love, Simon', '2018-03-16', 109, 'Love, Simon hits its coming-of-age beats more deftly than many entries in this well-traveled genre -- and represents an overdue, if not entirely successful, milestone of inclusion.', 'Everyone deserves a great love story. But for seventeen-year old Simon Spier it\'s a little more complicated: he\'s yet to tell his family or friends he\'s gay and he doesn\'t actually know the identity of the anonymous classmate he\'s fallen for online. Resolving both issues proves hilarious, terrifying and life-changing. Directed by Greg Berlanti (Riverdale, The Flash, Supergirl), written by Isaac Aptaker & Elizabeth Berger (This is Us), and based on Becky Albertalli\'s acclaimed novel, LOVE, SIMON is a funny and heartfelt coming-of-age story about the thrilling ride of finding yourself and falling in love.', 'assets/img/simon.jpg', 14),
(10, 'Potrait Of a Lady On Fire', '2020-02-14', 119, 'A singularly rich period piece, Portrait of a Lady on Fire finds stirring, thought-provoking drama within a powerfully acted romance.', 'France, 1760. Marianne is commissioned to paint the wedding portrait of Héloïse, a young woman who has just left the convent. Because she is a reluctant bride-to-be, Marianne arrives under the guise of companionship, observing Héloïse by day and secretly painting her by firelight at night. As the two women orbit one another, intimacy and attraction grow as they share Héloïse\'s first moments of freedom. Héloïse\'s portrait soon becomes a collaborative act of and testament to their love.', 'assets/img/potraitlady.jpg', 4),
(11, 'Black Panther', '2019-02-16', 135, 'Black Panther elevates superhero cinema to thrilling new heights while telling one of the MCU\'s most absorbing stories -- and introducing some of its most fully realized characters.', '\"Black Panther\" follows T\'Challa who, after the events of \"Captain America: Civil War,\" returns home to the isolated, technologically advanced African nation of Wakanda to take his place as King. However, when an old enemy reappears on the radar, T\'Challa\'s mettle as King and Black Panther is tested when he is drawn into a conflict that puts the entire fate of Wakanda and the world at risk.', 'assets/img/panther.jpg', 3),
(12, 'Thor: Ragnarok', '2017-11-03', 130, 'Exciting, funny, and above all fun, Thor: Ragnarok is a colorful cosmic adventure that sets a new standard for its franchise -- and the rest of the Marvel Cinematic Universe.', 'In Marvel Studios\' \"Thor: Ragnarok,\" Thor is imprisoned on the other side of the universe without his mighty hammer and finds himself in a race against time to get back to Asgard to stop Ragnarok--the destruction of his homeworld and the end of Asgardian civilization--at the hands of an all-powerful new threat, the ruthless Hela. But first he must survive a deadly gladiatorial contest that pits him against his former ally and fellow Avenger--the Incredible Hulk!', 'assets/img/thor.jpg', 3),
(13, '6 Underground', '2019-12-13', 128, '6 Underground is loud, frenetic, and finally preposterous -- which is either bad news or a hearty recommendation, depending how one feels about the movies of Michael Bay.', 'What\'s the best part of being dead? It isn\'t escaping your boss, your ex, or even erasing your criminal record. The best part about being dead...is the freedom. The freedom to fight the injustice and evil that lurk in our world without anyone or anything to slow you down or tell you \"no.\" 6 Underground introduces a new kind of action hero. Six individuals from all around the globe, each the very best at what they do, have been chosen not only for their skill, but for a unique desire to delete their pasts to change the future. The team is brought together by an enigmatic leader (Ryan Reynolds), whose sole mission in life is to ensure that, while he and his fellow operatives will never be remembered, their actions damn sure will.', 'assets/img/6underground.jpg', 1),
(14, 'Train To Busan', '2016-07-22', 118, 'Train to Busan delivers a thrillingly unique -- and purely entertaining -- take on the zombie genre, with fully realized characters and plenty of social commentary to underscore the bursts of skillfully staged action.', 'TRAIN TO BUSAN is a harrowing zombie horror-thriller that follows a group of terrified passengers fighting their way through a countrywide viral outbreak while trapped on a suspicion-filled, blood-drenched bullet train ride to Busan, a southern resort city that has managed to hold off the zombie hordes... or so everyone hopes.', 'assets/img/busan.jpg', 7),
(15, 'Birds of Prey', '2020-02-07', 120, 'With a fresh perspective, some new friends, and loads of fast-paced action, Birds of Prey captures the colorfully anarchic spirit of Margot Robbie\'s Harley Quinn.', 'You ever hear the one about the cop, the songbird, the psycho and the mafia princess? \"Birds of Prey (And the Fantabulous Emancipation of One Harley Quinn)\" is a twisted tale told by Harley herself, as only Harley can tell it. When Gotham\'s most nefariously narcissistic villain, Roman Sionis, and his zealous right-hand, Zsasz, put a target on a young girl named Cass, the city is turned upside down looking for her. Harley, Huntress, Black Canary and Renee Montoya\'s paths collide, and the unlikely foursome have no choice but to team up to take Roman down.', 'assets/img/birdsofprey.jpg', 6),
(16, 'A Simple Favor', '2018-09-14', 116, 'Twisty, twisted, and above all simply fun, A Simple Favor casts a stylish mommy noir spell strengthened by potent performances from Anna Kendrick and Blake Lively.', 'A SIMPLE FAVOR, a stylish post-modern film noir directed by Paul Feig, centers around Stephanie (Anna Kendrick), a mommy blogger who seeks to uncover the truth behind her best friend Emily\'s (Blake Lively) sudden disappearance from their small town. Stephanie is joined by Emily\'s husband Sean (Henry Golding) in this thriller filled with twists and betrayals, secrets and revelations, love and loyalty, murder and revenge.', 'assets/img/simplefavor.jpg', 17),
(17, '1917', '2020-01-10', 110, 'Hard-hitting, immersive, and an impressive technical achievement, 1917 captures the trench warfare of World War I with raw, startling immediacy.', 'At the height of the First World War, two young British soldiers, Schofield (Captain Fantastic\'s George MacKay) and Blake (Game of Thrones\' Dean-Charles Chapman) are given a seemingly impossible mission. In a race against time, they must cross enemy territory and deliver a message that will stop a deadly attack on hundreds of soldiers--Blake\'s own brother among them.', 'assets/img/1917.jpg', 8),
(18, 'A Quiet Place', '2018-04-06', 110, 'A Quiet Place artfully plays on elemental fears with a ruthlessly intelligent creature feature that\'s as original as it is scary -- and establishes director John Krasinski as a rising talent.', 'In the modern horror thriller A QUIET PLACE, a family of four must navigate their lives in silence after mysterious creatures that hunt by sound threaten their survival. If they hear you, they hunt you.', 'assets/img/quietplace.jpg', 19),
(19, 'Midsommar', '2019-07-03', 140, 'Ambitious, impressively crafted, and above all unsettling, Midsommar further proves writer-director Ari Aster is a horror auteur to be reckoned with.', ' Dani and Christian are a young American couple with a relationship on the brink of falling apart. But after a family tragedy keeps them together, a grieving Dani invites herself to join Christian and his friends on a trip to a once-in-a-lifetime midsummer festival in a remote Swedish village. What begins as a carefree summer holiday in a land of eternal sunlight takes a sinister turn when the insular villagers invite their guests to partake in festivities that render the pastoral paradise increasingly unnerving and viscerally disturbing. From the visionary mind of Ari Aster comes a dread-soaked cinematic fairytale where a world of darkness unfolds in broad daylight.', 'assets/img/midsommar.jpg', 22),
(20, 'The Handmaiden', '2016-10-23', 130, 'The Handmaiden uses a Victorian crime novel as the loose inspiration for another visually sumptuous and absorbingly idiosyncratic outing from director Park Chan-wook.', 'From PARK Chan-wook, the celebrated director of OLDBOY, LADY VENGEANCE, THIRST and STOKER, comes a ravishing new crime drama inspired by the novel \'FINGERSMITH\' by British author Sarah Waters. Having transposed the story to 1930s-era colonial Korea and Japan, Park presents a gripping and sensual tale of a young Japanese Lady living on a secluded estate, and a Korean woman who is hired to serve as her new handmaiden, but who is secretly involved in a conman\'s plot to defraud her of her large inheritance. Powered by remarkable performances from KIM Min-hee (RIGHT NOW, WRONG THEN) as Lady Hideko, HA Jung-woo (THE CHASER) as the conman who calls himself the Count and sensational debut actress KIM Tae-ri as the maid Sookee, THE HANDMAIDEN borrows the most dynamic elements of its source material and combines it with PARK Chan-wook\'s singular vision and energy to create an unforgettable viewing experience.', 'assets/img/handmaiden.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `idMovie_Genre` int(50) NOT NULL,
  `idMovie` int(100) NOT NULL,
  `idGenre` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movie_genre`
--

INSERT INTO `movie_genre` (`idMovie_Genre`, `idMovie`, `idGenre`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 3, 5),
(4, 3, 4),
(5, 5, 1),
(6, 7, 1),
(7, 6, 8),
(9, 2, 6),
(10, 4, 1),
(11, 4, 7),
(12, 8, 3),
(13, 8, 1),
(15, 14, 8),
(16, 14, 1),
(17, 15, 4),
(18, 15, 5),
(19, 16, 1),
(20, 16, 6),
(21, 17, 1),
(22, 18, 8),
(23, 18, 6),
(24, 19, 8),
(25, 19, 6),
(26, 20, 7),
(27, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movie_review`
--

CREATE TABLE `movie_review` (
  `idMovie_Review` int(255) NOT NULL,
  `idMovie` int(100) NOT NULL,
  `idReview` int(100) NOT NULL,
  `idCritic` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movie_review`
--

INSERT INTO `movie_review` (`idMovie_Review`, `idMovie`, `idReview`, `idCritic`) VALUES
(1, 1, 2, 1),
(2, 8, 1, 3),
(3, 4, 3, 2),
(4, 5, 4, 4),
(5, 2, 5, 3),
(6, 3, 6, 4),
(7, 6, 7, 2),
(8, 7, 8, 1),
(9, 9, 9, 3),
(10, 10, 10, 1),
(11, 11, 11, 2),
(12, 12, 12, 4),
(13, 13, 13, 1),
(14, 14, 14, 3),
(15, 15, 15, 4),
(16, 16, 16, 1),
(17, 17, 17, 3),
(18, 18, 18, 4),
(19, 19, 19, 1),
(20, 20, 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idReview` int(100) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`idReview`, `text`) VALUES
(1, 'The story of Little Women is coloured by the complementarity of the four March sisters, each with different desires and ambitions, who end up with completely different futures. Beth, the quiet and musical one, contracts scarlet fever and passes away. Amy, the artistic one who yearns to be loved, aspires to marry rich from the off, and ends up with Laurie, the March family’s handsome and wealthy neighbour. Meg, the eldest and most selfless one, marries Laurie’s tutor John Brooks and has children at the film and book’s halfway point. And Jo? Arguably the main character, the headstrong writer who has always sworn herself to remain independent? Now, here’s where the story begins to bend.\r\n<br/><br/>\r\nWhen I saw this ending for the first time on the big screen, I didn’t know what to do with myself. The tropes I’ve grown so tired of, the happy endings that feel untrue and incomplete, were coloured here in a different light – not mocked, but entirely transformed. The subversion took me by surprise precisely because of how fluid it is. It\'s an ending that leaves me free to place faith in whichever outcome I need, whenever I need it.\r\n<br/><br/>\r\nI love the grace and the hope I feel when watching it unfold. I admire the way Gerwig toes the line between audacity and care, at all times. This ending gives each and every viewer the confidence to know that there can always be another way to keep faith, and see a new future in the same story.\r\n\r\n	\r\n'),
(2, 'Jibran (Nanjiana) and Leilani (Issae Rae) are a couple on the brink. Once soul mates, their four-year-long relationship has become a breeding ground for spiteful digs and petty arguments. En route to a friend’s party, they finally decide to break up – only for their car to collide with a bicyclist. Before long, their vehicle has been hi-jacked by a violent hitman, who murders the bicyclist and frames them as the killers. The only way out, apparently, is to solve the murder before the cops do, thus proving their innocence. Inevitably, this leads them into a far larger conspiracy, but none of it feels plausible, even in a wacky comedy like this.\r\n<br/><br/>\r\nThis is a very shouty film, where basically every line is yelled and every conversation is delivered in squawky, back-and-forth exchanges, punctuated with hit-and-miss pop cultural references. There is a breeziness to the whole affair as it goes from one scene to the next, yet it feels so lightweight, disposable and contrived – you basically stop thinking about The Lovebirds before it’s even over. Characters come and go with little consequence, whilst people are shot and maimed in a way that undermines the light-hearted tone. At the halfway point it starts to feel like a slog; we know what’s going to happen.\r\n'),
(3, 'The great joy of any Bong movie, of course, is that you rarely know where it’s headed. Parasite takes this conceit to the next level, resulting in his most unique and uncompromising work to date – confirmation of the director as a genre in and of himself, nailing an idiosyncratic style he has slowly and meticulously built from the ground up.\r\n<br/><br/>\r\nParasite is as elegantly composed and engaging as any film you are likely to encounter this – or any – year, and its immensely talented cast deserve the highest praise for allowing us to feel equal sympathy and distain for their characters, for selling us moments of comedy and melancholy, often in the same breath. My lone reservation lies in the film’s final quarter, which I don’t think is handled with quite the same brilliantly thought-out, precision engineering as the rest. It’s a minor complaint in a major work, though, and one that confirms Bong as one of cinema’s great modern visionaries. Single-handedly he makes the idea of genre seem so reductive. Why have one when you can have them all?\r\n\r\n'),
(4, 'A modern mansion sitting on the edge of a cliff; waves crashing against it in a tumultuous storm; a woman quietly escaping at night while her lover is asleep, as sinister violins play on the soundtrack: all the money in the world couldn’t keep her with him. \r\n<br/><br/>\r\nIf the metaphor isn’t particularly subtle, it is still extremely effective at representing the sense of endless dread that gaslighting and trauma (itself another way by which someone, too caught up in the webs of hurtful memory, is denied her experience of the world as it really is in the present) create in their victims. With his own invisible man film, Hollow Man, Paul Verhoeven made explicit the bad behaviour that one would inevitably engage in if he couldn’t be held accountable for it. The Invisible Man manages to be an even more unpleasant watch – as well as a more interesting one – because it focuses the other side of that dynamic, and understands that having one’s sense of reality refuted by men who try to make their actions disappear is already a common experience.'),
(5, 'First and foremost is Mulligan who is sensationally good as Cassie, showing hitherto unseen comic abilities, the kind of performance that never relents, it just builds and builds until finally it explodes. She’s always been good but never this flooring and with her headlining almost every scene, the film is forever compelling as a result as it’s impossible to drag your eyes away from her, curious to know just what she’ll do next. There’s also a magnetic turn from Bo Burnham as her love interest and the pair have genuine chemistry, enough to fill an entirely separate romantic comedy.\r\n<br/><br/>\r\nThe plot takes some darker turns as we learn Cassie’s backstory and while Mulligan is able to sell the more dramatic elements given her background, the severe tonal shifts don’t always work quite as well as she does. Fennell can’t seem to decide what kind of film she wants to make and it’s only because so much of it soars, that I found myself frustrated by the elements and decisions that threaten to crash the whole thing down. It remains afloat though, scrappily, as Fennell’s ruthless puncturing of straight-bro toxicity is sharp until the sure-to-be-divisive finale which is bravely and perhaps realistically dour with its worldview.'),
(6, 'In chess, an “endgame” sees relatively few pieces on the board – but of course, this film is much more heavily populated. Tony Stark (Robert Downey Jr) is floating, desolately, in space, staring extinction in the face. Hawkeye (Jeremy Renner) confronts the loss of his family – a rather eerie, challengingly downbeat opening scene. Steve Rogers, formerly Captain America (Chris Evans) is helping others deal with their awful sense of cosmic grief. Rhodey (Don Cheadle) and Black Widow (Scarlett Johansson) are grimly getting on things. Captain Marvel (Brie Larson) is a vivid new presence in everyone’s lives.\r\n<br/><br/>\r\nAvengers: Endgame is entirely preposterous and, yes, the central plot device here does not, in itself, deliver the shock of the new. But the sheer enjoyment and fun that it delivers, the pure exotic spectacle, are irresistible, as is its insouciant way of combining the serious and the comic. Without the comedy, the drama would not be palatable. Yet without the earnest, almost childlike belief in the seriousness of what is at stake, the funny stuff would not work either. As an artificial creation, the Avengers have been triumphant, and as entertainment, they have been unconquerable.'),
(7, 'It can be easy to overstate the case of a movie like “Ready or Not.” It’s replete with ‘badass’ images of Grace in her wedding dress wearing post-\"Kill Bill\" swagger heading to do battle with the batty Le Domas progeny, covered in blood, sporting a bandolier, a half-baked quip, and a ripped wedding dress. It’s filled with easy jokes about the insanity of the rich and the callousness with which they take to their task of hunting and killing a woman on the grounds of their mansion. It’s got cavalier work from Brody, MacDowell (who struggles a little with the tone), and Kristian Bruun as Emeilie’s jackass husband, but they should all be funnier and they should all have been given a little more to chew. Czerny and Weaving are the only ones who fully seize every second of their screen time, showcasing the full bodied comedy and crazy eyed horror this might have been. \r\n<br/><br/>\r\nThe film is charismatic and thrilling enough to bypass its shortcomings. Weaving makes for a very likable hero, with a broad comedic appeal, an every-girl clumsiness and sarcastic rejoinder for everything. In a better world, she’d be headlining comedies already. She makes for a likable action hero precisely because she knows and shows that the clothes don’t fit her. In her tattered wedding dress, she fights for her life against everyone from her young nephews to the butler. Every wound she receive shows her that the backwards morality by which the rich live is so deeply ingrained that no amount of pleading could right the course. It’s also her first clue that not even her beloved Alex will be able to get her out of this jam. She’s not just fighting people, she’s fighting tradition and the idea of family. '),
(8, 'With “Swallow,” director Carlo Mirabella-Davis draws us into the domestic horror of a housewife. Against a backdrop of pink hues, Hunter (Haley Bennett), a soft-spoken new bride, finds her inner life spiraling. Born into a troubled home, Hunter has married into a picture-perfect wealthy family. Her acceptance, however, quickly becomes conditional on her obedience, as she spends long days in her husband\'s isolated modernist home, overlooking an endless forest. \r\n<br/><br/>\r\nUnlike many pregnancy-themed horror movies, “Swallow,” quite radically, doesn\'t linger on the monstrosity of the body and transformations that come with it. It is a film that inverses the typical trajectory by having a character begin in a state of subjugation, who slowly fights for ownership and freedom over her body and life. “Swallow” is an uncompromising horror that evokes deeply rooted alienation and dysmorphia. Hunter’s journey will take her on a path towards connecting the mind and body, even only briefly. Only Jonathan Glazer\'s “Under the Skin” does a better job of evoking the particular pull of being an outsider in your own body. '),
(9, 'With its sheer warmth, openness, likability and idealism, Love, Simon won me over. It takes all the corniness and tweeness of the coming-of-age genre and transplants new heart into it. A high-school kid is about to come out as gay. This is Simon, played by 23-year-old Nick Robinson, and his story puts a smart new spin on straight romcom classics such as The Shop Around the Corner and You’ve Got Mail, with their anonymised romances.\r\n<br/><br/>\r\nThis movie’s storyline does come carefully encased in an unassumingly small-c conservative plot superstructure, and in the real world not everyone in Simon’s situation has such a well-off home, sophisticated and pricey vinyl collection or impeccably liberal, non-bigoted family and circle of friends, whose reactions are never in doubt. Here the hostility is carefully quarantined to a couple of obviously homophobic boys, whose narrative function is to be trounced and then tacitly forgiven. The only other out gay kid in the school is almost impossibly witty and well-adjusted, nearly middle-aged in his droll composure. In real life, things are a bit more muddled than that. But what a smart, fun, engaging film.'),
(10, 'A thrillingly versatile film-maker Céline Sciamma has proved to be. Having made an arthouse splash with the Euro-hits Water Lilies and Tomboy, she wrote and directed Girlhood (Bande de filles), a breathtaking portrait of modern “banlieue life” that completed her “accidental trilogy of youth”. Her impressive screenplay credits include Claude Barras’s My Life as a Courgette, a tenderly empathetic, French-Swiss stop-motion masterpiece that earned an Oscar nomination for its vividly resilient depiction of children in care. In each of these very different projects, Sciamma has struck an accessible chord by focusing tightly on specifics, finding the key to universal appeal in the unique, tiny details of each story and character.\r\n<br/><br/>\r\nDigitally filmed in tactile, painterly hues by Claire Mathon, who did such shimmering work on Mati Diop’s Atlantics, Portrait of a Lady on Fire (the French title uses the less Jamesian “jeune fille”) seamlessly intertwines themes of love and politics, representation and reality. At times it plays like a breathless romance, trembling with passionate anticipation. Elsewhere, it seems closer to a sociopolitical treatise, what Sciamma has called “a manifesto about the female gaze”.'),
(11, 'Even if it had nothing else going for it, Black Panther would still be the best-looking Marvel movie yet. Supersaturated with vivid afro-futurism and as bold and riotous as a rack of dashiki print shirts, it looks like a particularly excitable Sun Ra album cover. Fortunately, the film doesn’t trade on looks alone.\r\n<br/><br/>\r\nT’Challa inherits the throne of Wakanda, the secretive techtropolis that has concealed itself from the rest of the world. And he assumes the mantle of Black Panther, complete with an impenetrable battle suit engineered by his genius kid sister, Shuri (Letitia Wright, who gets to play with most of the best lines as well as all the cool kit). Supporting T’Challa is Wakanda’s top warrior, Okoye (Danai Gurira), lethal with a spear but who also, in one gif-friendly shot, does an impressive amount of damage by hurling her wig.'),
(12, 'He might be able to summon lightning from the skies and smite foes with his mighty hammer, but this latest comic-book outing bestows upon Thor an even super-er superpower: a sense of humour. It’s there from the opening seconds, when we find our Norse god dangling before some horned demon, whose portentous monologuing is undercut by Thor’s continual interruptions, as he slowly spins around on his chains: “Hang on a minute… coming round again.” For a relative newcomer to the Earth, Thor has clearly got the knack of 21st-century comic timing.\r\n<br/><br/>\r\nFans will be satisfied at the most fleshed-out performance of Hulk we’ve yet had in this Marvel universe, though Mark Ruffalo is charmingly confused when he’s being Bruce Banner. And rounding out the cast is Tessa Thompson, who turns up as a lapsed warrior from Thor’s neck of the cosmos, which is a useful coincidence. There are a great many corners cut, plot holes papered over, and laws of physics bent out of recognition in this movie, to be honest. And if you’ve sat through the past dozen recent Marvel movies, you’ll find the core elements very familiar – a rag-tag team of heroes (Thor unimaginatively dubs them “the Revengers”), an all-powerful antagonist, an impending apocalypse, and a set of essentially unkillable characters. Added to which, the liberal use of CGI and green screen makes for a visual flimsiness. Even the scenes set in “Norway” look fake.'),
(13, 'With its makeshift family, high-speed car chases, and elaborate heists, Netflix’s action blockbuster “6 Underground” is solid proof that Michael Bay would love to direct a “Mission: Impossible” or “Fast and Furious” movie. It also makes it clear why that would be a bad idea.\r\n<br/><br/>\r\nBefore we get up in arms about what\'s \"allowed\" to be in an action movie, whether or not the subject matter rubs you the wrong way doesn\'t really matter because the main purpose of a film like “6 Underground” is to entertain. No one is really arguing otherwise. (I just don\'t find reflections of the last decade in Syria entertaining.) Most important, the film simply comes apart under that basic definition of its purpose. It becomes repetitive, nonsensical, and just loud after everyone gets an origin story and we\'re left with nothing to do but go boom. At the end, one of the characters even seems to understand that this is how most viewers will feel after watching, saying that this team can still “do some shit … awfully loud.” “6 Underground” is definitely some awfully loud shit. \r\n'),
(14, 'This rip-roaring, record-breaking South Korean zombies-on-a-train romp barrels along like a runaway locomotive – The Railing Dead. Owing as much to Bong Joon-ho (director of creature-feature hit The Host) as to George A Romero, Yeon Sang-ho’s breathless cinematic bullet train boasts frantic physical action, sharp social satire and ripe sentimental melodrama designed to reach into your ribcage and rip out your bleeding heart. Faster on its feet than 2004’s Dawn of the Dead remake, wittier than Pride and Prejudice and Zombies and more thrillingly spectacular than World War Z, Train to Busan joins The Girl With All the Gifts in breathing new life into a genre that simply refuses to lie down and die.\r\n<br/><br/>\r\nAs with Yeon’s previous work, a healthy distrust of authority underpins the action, a theme amplified here in the wake of the 2015 Mers outbreak. “Fellow citizens, please refrain from responding to baseless rumours,” burbles an authoritarian voice on TV, even as social media is awash with apocalyptic images of bodies falling from the skies and bloodshed on the streets. “We must stay calm and trust the government. We believe that your safety is not in jeopardy!” Crucially, the virulence of this outbreak is clearly equated with poisonous traits already embedded in society, with Seok-woo being pointedly described as “a bloodsucker” who “leeches off others” even as zombies sink their teeth into passengers.'),
(15, 'Kudos to whoever it was at DC Comics who realised that, while the good guys in the stable are kind of played out (and let’s face it, the Batsuit is looking increasingly like a concrete boot for the career), there is all kinds of fun to be had with the bad guys. Further props to DC for riding out the initial wobble that was Suicide Squad and ploughing forward with first Joker and now Birds of Prey, a showcase for the exuberantly unhinged Harley Quinn, who, when the film starts, is in the process of carving out her place in the world following her breakup with the J-man.\r\n<br/><br/>\r\nDirector Cathy Yan brilliantly captures a gaudy, grubby sense of place, part Gotham City, part the sparking trash-fire inside Harley’s head. And, while there’s an unfortunate It’s a Knockout vibe to some of the action, for the most part it’s a riot: slickly choreographed bone-snapping chaos executed with a demented, cheerleading flourish.'),
(16, 'The lip-smacking, acid drops of malice in the latest film from Paul Feig (Bridesmaids) makes this unexpectedly cruel comedy as intoxicating as the mid-afternoon martinis swilled by the two central characters. Anna Kendrick is Stephanie, the annoyingly chipper mum who always goes that extra mile when it comes to extracurricular point-scoring. Blake Lively is Emily, the hard-as-a-gel-manicure fashion PR exec whose idea of a playdate begins and ends with cocktails. But somehow, over shared confidences and gin, the pair become best friends. Then Emily asks Stephanie one simple favour – to collect her son from school – and disappears.\r\n<br/><br/>\r\nKendrick is a perky delight as a character who is by no means as squeaky-clean as she first appears. Her investigation into the truth behind Emily’s fate features inventive but not always convincing disguises (“Never wear a vintage Hermès scarf with a Gap T-shirt. If you were truly Emily’s friend, you would know that,” snarks Emily’s boss) and gloriously passive-aggressive use of her Mommy-vlog. The film earns extra points for a flirty wink of a soundtrack full of breathy 1960s French pop.'),
(17, 'With meticulous attention to detail (plaudits to production designer Dennis Gassner) and astonishingly fluid cinematography by Roger Deakins that shifts from ground level to God’s-eye view, Mendes puts his audience right there in the middle of the unfolding chaos. There’s a real sense of epic scale as the action moves breathlessly from one hellish environment to the next, effectively capturing our reluctant heroes’ sense of anxiety and discovery as they stumble into each new unchartered terrain. This is nail-biting stuff, interspersed with genuine shocks and surprises. Whether it’s a tripwire moment that provokes an audible gasp, a distant dogfight segueing into up-close-and-personal horror, or a single gunshot that made me jump out of my seat during an otherwise near-silent sequence, there’s no doubting the film’s theatrical impact.\r\n<br/><br/>\r\nThroughout this Homeric odyssey, Thomas Newman’s pulsing score ratchets up the tension, travelling “up the down trench”, through the body-strewn carnage of no man’s land (a forest of wood and wire, bone and blood) and into the eerie environs of deserted farmhouses and bombed-out churches. Occasionally, we hear echoes of the rising crescendo of Hans Zimmer’s Dunkirk score; elsewhere, Newman’s cues are full of piercing melancholia mingled with distant threat.\r\n<br/><br/>\r\nIn a film in which music plays such a crucial role, it’s significant that perhaps the most powerful scene is an interlude of song. Emerging from a river after a baptismal episode of death and rebirth, we find ourselves in a wood where a young man sings The Wayfaring Stranger. It’s an interlude that brings the characters and audiences together in silence, communally experiencing that still-small voice of calm that lies at the heart of so many great war movies.'),
(18, 'If ever a film had me mentally tiptoeing over a booby-trapped carpet of eggshells while silently gibbering with anxiety, it’s this brutal sci-fi suspense thriller, written by horror specialists Scott Beck and Bryan Woods and directed by John Krasinski, who developed the screenplay with them and stars – alongside Emily Blunt. It’s set in a postapocalyptic wasteland. But this isn’t a young adult drama, it’s a prematurely old adult drama, a world in which innocence, childhood and happiness have been blowtorched off the face of the Earth.\r\n<br/><br/>\r\nA Quiet Place allows you to worry at a strange thought: might it be possible to live life entirely safely and even normally in this situation, if you could somehow mentally train yourself, or evolve over a few generations, to do without sound? Might this be a workable, natural mode of existence? Could you internalise the fear and remain silent to avoid the predators in the way that you might naturally change your habits in some locales to avoid bears or snakes?'),
(19, 'Midsommar is an outrageous black-comic carnival of agony, starring charismatic Florence Pugh in a comely robe and floral headdress. It features funny-tasting pies and chorally assisted ritual sex, with pagan celebrants gazing into the middle distance and warbling as solemnly as the young dudes in the Coca-Cola TV ad about teaching the world to sing. It’s all set in an eerily beautiful sunlit plain, bounded by forests and lakes. This is supposed to be somewhere in northern Sweden, but was filmed in Hungary, and Aster, cinematographer Pawel Pogorzelski and production designer Henrik Svensson have collaborated on what are surely digitally assisted images: the sky and fields becoming a bouquet of vivid and beautiful blues and greens. The music from British composer Bobby Krlic (AKA the Haxan Cloak) is sensually creepy.\r\n<br/><br/>\r\nIt’s a thoroughly enjoyable film, a crescendo of paranoid trippiness building to an uproarious grossout in its final moments – of which the poster image, incidentally, gives you no clue. Once we are in that weirdly unreal Swedish clearing, the narrative turbulence clears and things appear initially as calm as a millpond. Yet there is a point to that becalmedness. It helps create the ambient disquiet.'),
(20, 'The film is drenched with eroticism: it permeates the surfaces and textures, the rituals of teacher and pupil – the preposterous pretext for the Count’s visits is that he is teaching her to paint – and of course in the secret theatre of sex that plays out in the world of mistress and maidservant. In the licensed intimacy of Hideko’s bedroom, Sook-hee is allowed to undress Hideko, who playfully pretends to be the servant by undressing her in turn. In the manner of classic Victorian erotica, the handmaiden demonstrates to her awestruck mistress in bed exactly what she can expect on her wedding night.\r\n<br/><br/>\r\nThe Handmaiden is about pornography, albeit pornography of the high-minded connoisseur kind from the Gutenberg age: rare books. Hideko has to read aloud from sub-Sadean material and then – in a fantastically twisted scene – pose on a kind of porn trapeze with a male mannequin. And porn’s undertow of shame has a political dimension. It is a cousin to the mortification of submitting to colonial rule. But sex is the sanctuary from pornography in The Handmaiden, the sex that Hideko and Sook-hee enjoy is the refuge from porn and its furniture of abuse and control.');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `idStudio` int(50) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`idStudio`, `name`) VALUES
(1, 'Netflix'),
(2, 'Focus Features'),
(3, 'Marvel Studios'),
(4, 'NEON'),
(5, 'Sony Pictures'),
(6, 'Warner Bros. Pictures'),
(7, 'RedPeter Film'),
(8, 'Universal Pictures'),
(9, 'Radius TWC'),
(10, 'Fox Searchlight Pictures'),
(11, 'IFC Films'),
(12, 'Columbia Pictures'),
(13, 'Film Arcade'),
(14, '20th Century Fox'),
(15, 'Walt Disney Pictures'),
(16, 'A24'),
(17, 'Lionsgate'),
(18, 'STXfilms'),
(19, 'Paramount Pictures'),
(20, 'Sony Pictures'),
(21, 'Big World Pictures'),
(22, 'Annapurna Pictures'),
(23, 'The Weinstein Company'),
(24, 'See Saw Films');

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `idTrailer` int(50) NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `idMovie` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`idTrailer`, `link`, `idMovie`) VALUES
(1, 'https://www.youtube.com/embed/YzPq8uVgLe8', 1),
(2, 'https://www.youtube.com/embed/7i5kiFDunk8', 2),
(3, 'https://www.youtube.com/embed/hA6hldpSTF8', 3),
(4, 'https://www.youtube.com/embed/5xH0HfJHsaY', 4),
(5, 'https://www.youtube.com/embed/WO_FJdiY9dA', 5),
(6, 'https://www.youtube.com/embed/ZtYTwUxhAoI', 6),
(7, 'https://www.youtube.com/embed/auVZKcxV7XQ', 7),
(8, 'https://www.youtube.com/embed/ykHeGtN4m94', 9),
(9, 'https://www.youtube.com/embed/R-fQPTwma9o', 10),
(10, 'https://www.youtube.com/embed/xjDjIWPwcPU', 11),
(11, 'https://www.youtube.com/embed/ue80QwXMRHg', 12),
(12, 'https://www.youtube.com/embed/YLE85olJjp8', 13),
(13, 'https://www.youtube.com/embed/AST2-4db4ic', 8),
(14, 'https://www.youtube.com/embed/1ovgxN2VWNc', 14),
(15, 'https://www.youtube.com/embed/x3HbbzHK5Mc', 15),
(16, 'https://www.youtube.com/embed/rAqMlh0b2HU', 16),
(17, 'https://www.youtube.com/embed/YqNYrYUiMfg', 17),
(18, 'https://www.youtube.com/embed/WR7cc5t7tv8', 18),
(19, 'https://www.youtube.com/embed/1Vnghdsjmd0', 19);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(255) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `idWebsiteRole` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `first_name`, `last_name`, `email`, `password`, `creation_date`, `idWebsiteRole`) VALUES
(1, 'Pera', 'Peric', 'pera@gmail.com', 'bf676ed1364b5857fba69b5623c81b64', '2020-06-09 22:00:00', 2),
(2, 'Tijana', 'Nestinac', 'tijana@gmail.com', 'e004af8dfb254b2e34457d337525029f', '2020-06-09 22:00:00', 2),
(3, 'Admin', 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', 1),
(4, 'Delete', 'Delete', 'delete@gmail.com', 'dbb396e09c5a99a6b312d44b32591597', '2020-07-11 19:03:43', 2),
(5, 'Update', 'Promena', 'update@gmail.com', '6013f0ecd4b3fec5482348dfb0c1cfd1', '2020-07-11 19:04:18', 2),
(6, 'Mika', 'Mikić', 'mika@gmail.com', '6a22a782e793be285a93657dcad15a69', '2020-07-11 22:09:00', 2),
(7, 'Sanja', 'Markovic', 'sanja@gmail.com', '1ab4a0eb08024e4b49d20cba226ad409', '2020-07-11 22:59:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `website_role`
--

CREATE TABLE `website_role` (
  `idWebsiteRole` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `website_role`
--

INSERT INTO `website_role` (`idWebsiteRole`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `critic`
--
ALTER TABLE `critic`
  ADD PRIMARY KEY (`idCritic`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`idMovie`),
  ADD KEY `idStudio` (`idStudio`);

--
-- Indexes for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`idMovie_Genre`),
  ADD KEY `idMovie` (`idMovie`),
  ADD KEY `idGenre` (`idGenre`);

--
-- Indexes for table `movie_review`
--
ALTER TABLE `movie_review`
  ADD PRIMARY KEY (`idMovie_Review`),
  ADD KEY `idMovie` (`idMovie`),
  ADD KEY `idReview` (`idReview`),
  ADD KEY `idCritic` (`idCritic`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`idStudio`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`idTrailer`),
  ADD KEY `idMovie` (`idMovie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idWebsiteRole` (`idWebsiteRole`);

--
-- Indexes for table `website_role`
--
ALTER TABLE `website_role`
  ADD PRIMARY KEY (`idWebsiteRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `critic`
--
ALTER TABLE `critic`
  MODIFY `idCritic` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `idGenre` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `idMovie` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `idMovie_Genre` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `movie_review`
--
ALTER TABLE `movie_review`
  MODIFY `idMovie_Review` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idReview` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `idStudio` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `trailer`
--
ALTER TABLE `trailer`
  MODIFY `idTrailer` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `website_role`
--
ALTER TABLE `website_role`
  MODIFY `idWebsiteRole` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`idStudio`) REFERENCES `studio` (`idStudio`);

--
-- Constraints for table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`),
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`);

--
-- Constraints for table `movie_review`
--
ALTER TABLE `movie_review`
  ADD CONSTRAINT `movie_review_ibfk_1` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`),
  ADD CONSTRAINT `movie_review_ibfk_2` FOREIGN KEY (`idReview`) REFERENCES `review` (`idReview`),
  ADD CONSTRAINT `movie_review_ibfk_3` FOREIGN KEY (`idCritic`) REFERENCES `critic` (`idCritic`);

--
-- Constraints for table `trailer`
--
ALTER TABLE `trailer`
  ADD CONSTRAINT `trailer_ibfk_1` FOREIGN KEY (`idMovie`) REFERENCES `movie` (`idMovie`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idWebsiteRole`) REFERENCES `website_role` (`idWebsiteRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
