-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 06:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_body` varchar(20000) NOT NULL,
  `book_cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`id`, `username`, `book_name`, `book_author`, `book_body`, `book_cover`) VALUES
(1, 'imran', 'Beyond Success', 'Jeffrey L. Gitterman', 'In his book&nbsp;<em>Beyond Success: Redefining the Meaning of Prosperity</em>, Jeffrey L. Gitterman explains that he likes to open his seminars by asking audience members &ldquo;what the definition of money means to them.&rdquo; Upon reading this particular passage, I took the time to reflect upon what money means to me. According to Mr. Gitterman, I am not alone in my belief that money equates to freedom and security. After all, money makes the world go round, and, to quote financier Gordon Gekko in Oliver Stone&rsquo;s movie&nbsp;<em>Wall Street</em>, &ldquo;what&rsquo;s worth doing is worth doing for money.&rdquo;\r\n\r\nGitterman explains that money is simply a means of exchange, and yet we act as if it is a clearcut path to all of our wants and desires. To put it simply, money does not equal happiness, nor should we define our success based on how much money we make.&nbsp;<em>Beyond Success</em>&nbsp;is an eye-opening experience that focuses on our definitions of success and the way they tie into the great existential dilemma.\r\n\r\n&ldquo;What is my purpose in life?&rdquo;\r\n\r\n&ldquo;How can I be permanently happy?&rdquo;\r\n\r\nWe ask ourselves these questions all the time, but fall into the traps that force us to believe that money and material items will fill the empty void within. Jeffrey Gitterman uses&nbsp;<em>Beyond Success</em>&nbsp;as a blueprint for how we can move beyond the standard definitions of money and happiness. He suggests we can find prosperity through spirituality and focusing our attention on how using our energy more purposefully. Using his&nbsp;<em>Four Pillar</em>&nbsp;plan, Gitterman provides us with four steps to connect and redirect our energies toward the type of personal fulfillment that money cannot buy.\r\n\r\nThere are bound to be skeptics who pick up this book, since the idea of finding true happiness seems to be a futile effort in this day and age. In the world of self-help, where everyone is a guru pushing their spiritual and religious beliefs and agendas, some may look at the cover of&nbsp;<em>Beyond Success&nbsp;</em>and say to themselves, &ldquo;yeah right, like some book is really going to help me to be successful.&rdquo; Gitterman suggests we are misdirecting our energy and settling for the abysmal trappings we have created for ourselves. Why put any effort into a self-help book? Why bother taking up yoga when the instant gratification of buying a new 3D high-definition LCD television is far greater? We are setting our sights on shiny, new toys because we are in a culture where bigger is better. In the end, the item we purchase or the lofty goals we set are never as fantastic when we obtain them because the thrill really takes place in the initial chase.\r\n\r\nThese basic ideas are logical and that says a lot about how&nbsp;<em>Beyond Success</em>unfolds. It never sounds preachy or pretentious, nor does it have any underlying hidden agenda like converting the reader to a certain religion or philosophy. Jeffrey Gitterman speaks to the common person in a conversational tone that one can easily connect with. Like an older brother giving advice, he is simply sharing his experiences and success stories in a modest and positive way. Everything he discusses is based on his own experiential learning, parallels to his work as a financial planner, and his longing to help others who may be stuck in a similar, existential situation as he once was.\r\n\r\nThere are moments in&nbsp;<em>Beyond Success</em>&nbsp;where readers might find themselves wanting to skip to the next chapter, but it is not because of the content &mdash; moreso the practice of several meditation and breathing exercises. The idea of stopping in the middle of a book to perform techniques such as closing your eyes and imagining your thoughts drifting by like twigs on a running stream may seem rather disruptive. However, no one is twisting your arm to participate. They are simply exercises that Gitterman suggests will help in controlling those daily stressors that run through your mind when you are trying to get a good night&rsquo;s&nbsp;<a href="https://psychcentral.com/disorders/sleep/">sleep</a>. Feel free to perform these techniques as you go or, as I did, bookmark these particular sections of the book to follow up with at a more convenient time.\r\n\r\nAll in all,&nbsp;<em>Beyond Success</em>&nbsp;leaves readers in a much better place than when they begin the journey into redefining the meaning of prosperity. After turning the final page, I was left feeling rejuvenated and more focused, especially when I did perform the exercises throughout the book. The ideas are delivered delicately and encompass such common sense that readers will find themselves nodding their heads in agreement from start to finish. Jeffrey Gitterman has found an audience with those struggling with the great existential dilemma in modern living, and his message is that prosperity is not found solely in the power of the almighty dollar, but the use of our energy in a positive way that sparks purpose and gives back to the ones we love and the world around us.&nbsp;\r\n', 'fe80f10a1ed7c6f8ff104919bf7428b1.jpg'),
(2, 'imran', 'Firestarter', 'Stephen King', '<em><strong>Firestarter</strong></em>&nbsp;is a 1984 American&nbsp;<a href="https://en.wikipedia.org/wiki/Science_fiction_film">science-fiction</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Horror_film">horror film</a>&nbsp;based on&nbsp;<a href="https://en.wikipedia.org/wiki/Stephen_King">Stephen King</a>&#39;s 1980 novel of the&nbsp;<a href="https://en.wikipedia.org/wiki/Firestarter_(novel)">same name</a>.<a href="https://en.wikipedia.org/wiki/Firestarter_(film)#cite_note-3">[3]</a>&nbsp;The plot concerns a young girl who develops&nbsp;<a href="https://en.wikipedia.org/wiki/Pyrokinesis">pyrokinesis</a>&nbsp;and the secret government agency known as&nbsp;<a href="https://en.wikipedia.org/wiki/The_Shop_(Stephen_King)">the Shop</a>&nbsp;which seeks to control her. The film was directed by&nbsp;<a href="https://en.wikipedia.org/wiki/Mark_L._Lester">Mark L. Lester</a>, and stars&nbsp;<a href="https://en.wikipedia.org/wiki/David_Keith">David Keith</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Drew_Barrymore">Drew Barrymore</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Martin_Sheen">Martin Sheen</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/George_C._Scott">George C. Scott</a>. The film was shot in and around&nbsp;<a href="https://en.wikipedia.org/wiki/Wilmington,_North_Carolina">Wilmington</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Chimney_Rock,_North_Carolina">Chimney Rock</a>, and&nbsp;<a href="https://en.wikipedia.org/wiki/Lake_Lure">Lake Lure</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/North_Carolina">North Carolina</a>.\r\n\r\nA&nbsp;<a href="https://en.wikipedia.org/wiki/Miniseries">miniseries</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Sequel">follow-up</a>&nbsp;to the film&nbsp;<em><a href="https://en.wikipedia.org/wiki/Firestarter:_Rekindled">Firestarter: Rekindled</a></em>, was released in 2002 on the&nbsp;<a href="https://en.wikipedia.org/wiki/Syfy">Sci-Fi Channel</a>.\r\n', '82565553daea78c526e1857c882461c1.jpg'),
(3, 'imran', 'A clockwork orange', 'Anthony Burgess', '<strong>A Clockwork Orange</strong>&nbsp;is a&nbsp;dystopian&nbsp;novel by English writer&nbsp;Anthony Burgess, published in 1962. Set in a near future&nbsp;English&nbsp;society featuring a subculture of extreme youth violence, the teenage protagonist,&nbsp;Alex, narrates his violent exploits and his experiences with state authorities intent on reforming him.The book is partially written in a&nbsp;Russian-influenced&nbsp;argot&nbsp;called &quot;Nadsat&quot;.\r\n\r\nAccording to Burgess, it was a&nbsp;jeu d&#39;esprit&nbsp;written in just three weeks. In 2005,&nbsp;A Clockwork Orange&nbsp;was included on&nbsp;Time&nbsp;magazine&#39;s list of the 100 best English-language novels written since 1923,&nbsp;and it was named by&nbsp;Modern Library&nbsp;and its readers as one of the&nbsp;100 best English-language novels of the 20th century.\r\n\r\nThe original manuscript of the book has been located at&nbsp;McMaster University&#39;s&nbsp;William Ready Division of Archives and Research Collections&nbsp;in&nbsp;Hamilton, Ontario, Canada since the institution purchased the documents in 1971.\r\n', 'fa8a4c4fe94365d8a45e5e81c8bdfa50.jpg'),
(4, 'imran', 'She Rises', 'Kate Worsley', 'It is 1740 and Louise Fletcher, a young dairy maid on an Essex farm, has been warned of the lure of the sea for as long as she can remember--after all, it stole away her father and brother. But when she is offered work in the bustling naval port of Harwich, as a lady&#39;s maid to a wealthy captain&#39;s daughter, she leaps at the chance to see more of the world. There she meets Rebecca, her haughty young mistress, who is unlike anyone Louise has encountered before: as unexpected as she is fascinating.<br />\r\n<br />\r\nIntertwined with her story is fifteen-year-old Luke&#39;s: He is drinking in a Harwich tavern when it is raided by Her Majesty&#39;s Navy. Unable to escape, Luke is beaten and press ganged and sent to sea on board the warship Essex. He must learn fast and choose his friends well if he is to survive the brutal hardships of a sailor&#39;s life and its many dangers, both up high in the rigging and in the dark below decks.<br />\r\n<br />\r\nLouise navigates her new life among the streets and crooked alleys of Harwich, where groaning houses riddled with smugglers&#39; tunnels are flooded by the spring tides, and love burns brightly in the shadows. Luke, aching for the girl he left behind and determined to one day find his way back to her, embarks on a long and perilous journey across the ocean.<br />\r\n<br />\r\nThe worlds they find are more dangerous and more exciting than they could ever have imagined, and when they collide the consequences are astonishing and irrevocable.<br />\r\n<br />\r\nA breathtakingly accomplished love story and a gripping search for identity and survival,&nbsp;<em>She Rises</em>&nbsp;is a bold, brilliant, and utterly original novel.\r\n', 'c7297478436457c0d54d061ed7e2f104.jpg'),
(5, 'imran', 'Life of PI', 'Yann Martel', '<em><strong>Life of Pi</strong></em>&nbsp;is a 2012 American&nbsp;survival&nbsp;drama film&nbsp;based on&nbsp;Yann Martel&#39;s&nbsp;2001 novel of the same name. Directed by&nbsp;Ang Lee, the film&#39;s&nbsp;adapted screenplay&nbsp;was written by&nbsp;David Magee, and it stars&nbsp;Suraj Sharma,&nbsp;Irrfan Khan,&nbsp;Rafe Spall,&nbsp;Tabu,&nbsp;Adil Hussain, and&nbsp;G&eacute;rard Depardieu. The storyline revolves around an Indian man named &quot;Pi&quot; Patel, telling a novelist about his life story, and how at 16 he survives a shipwreck in which his family dies, and is adrift in the&nbsp;Pacific Ocean&nbsp;on a lifeboat with a&nbsp;Bengal tiger.\r\n\r\n&nbsp;\r\n\r\nThe film had its&nbsp;worldwide premiere&nbsp;as the opening film of the 51st&nbsp;New York Film Festival&nbsp;at both the&nbsp;Walter Reade Theater&nbsp;and&nbsp;Alice Tully Hall&nbsp;in&nbsp;New York City&nbsp;on September 28, 2012. <em>Life of Pi</em>&nbsp;emerged as a critical and commercial success, earning over US$609 million worldwide. It was nominated for three&nbsp;Golden Globe Awards&nbsp;which included the&nbsp;Best Picture&nbsp;&ndash; Drama&nbsp;and the&nbsp;Best Director&nbsp;and won the&nbsp;Golden Globe Award for Best Original Score. At the&nbsp;85th Academy Awards, it had eleven nominations, including&nbsp;Best Picture&nbsp;and&nbsp;Best Adapted Screenplay, and won four (the most for the event) including&nbsp;Best Director&nbsp;for&nbsp;Ang Lee.\r\n', '597f5651d4f4086e61681dd758aade88.jpg'),
(6, 'ruba', 'Under the wide And starry sky', 'Nancy Horan', '<h2 style="font-style:italic;">At the age of thirty-five, Fanny van de Grift Osbourne leaves her philandering husband in San Francisco and sets sail for Belgium to study art, with her three children and a nanny in tow. Not long after her arrival, however, tragedy strikes, and Fanny and her brood repair to a quiet artists&#39; colony in France where she can recuperate. There she meets Robert Louis Stevenson, ten years her junior, who is instantly smitten with the earthy, independent and opinionated belle Americaine. A woman ahead of her time, Fanny does not immediately take to the young lawyer who longs to devote his life to literature, and who would eventually write such classics as Treasure Island and The Strange Case of Dr. Jekyll and Mr. Hyde. In time, though, she succumbs to Stevenson&#39;s charms. The two begin a fierce love affair, marked by intense joy and harrowing darkness, which spans decades as they travel the world for the sake of his health. Eventually they settled in Samoa, where Robert Louis Stevenson is buried underneath the epitaph: <em>Under the wide and starry sky,</em><br />\r\nDig the grave and let me lie.<br />\r\nGlad did I live and gladly die,<br />\r\n<em>And I laid me down with a will.</em> This be the verse you grave for me:<br />\r\nHere he lies where he longed to be;<br />\r\nHome is the sailor, home from sea,<br />\r\nAnd the hunter home from the hill.</h2>\r\n', '06bdeda00be5dbc024421ec6f1234afa.jpg'),
(7, 'ruba', 'The Good ones', 'Bruce weinstein', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.&amp;nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.', '51300da2d9322479ce2517f82c6acc14.jpg'),
(8, 'ruba', 'how to be the perfect dutch', 'kathian brands', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.&amp;nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.', 'e3a83964bffd4fe77a76c30933f1d14c.jpg'),
(9, 'ruba', 'fates and furies', 'lauren groff', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.&amp;nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.', 'faf8ec501de0ea0d534054931679cf23.jpg'),
(10, 'ruba', 'Responsive web design', 'jeremy keith', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.&amp;nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti quos cum esse nostrum id minus laudantium sint error. Voluptatem aliquid suscipit molestiae eius tempora non illo dolore dolorem nam recusandae.', '6aa461a34ce5acd84130ddbed5188c87.jpg'),
(11, 'imran', 'The vegetarian', 'Han Kang', '<strong>The Vegetarian</strong> (<s>Hangul</s>: ì±„ì‹ì£¼ì˜ìž; RR: Chaesikjuuija) is a <big>South Korean</big> three-part drama novella written by Han Kang and first published in 2007. Based on Kang&#39;s 1997 short story &quot;The Fruit of My Woman&quot;, The Vegetarian is set in modern-day Seoul and tells the story of Yeong-hye, a homemaker, whose decision to stop eating meat after a bloody, nightmarish dream about human cruelty leads to devastating consequences in her personal and familial life. Published on 30 October 2007 in South Korea by Changbi Publishers, The Vegetarian was received as &quot;very extreme and bizarre&quot; by the Korean audience. &quot;Mongolian Mark&quot;, the second and central part of the novella was awarded the prestigious Yi Sang Literary Prize. It has been translated into at least thirteen languages, including English, French, Spanish, and Chinese. The Vegetarian is Han&#39;s second book to be translated into English. The translation was conducted by the British translator Deborah Smith, and was published in January 2015 in the UK and February 2016 in the US, after which it received international critical acclaim, with critics praising Kang&#39;s writing style and Smith&#39;s translation. In May 2016, it won the 2016 Man Booker International Prize. The Vegetarian thus became the first recipient of the award after its reconfiguration in 2015, prior to which it was awarded to an author&#39;s body of work rather than a single novel. It is considered as Korean translated literature&#39;s biggest win since Kyung-Sook Shin&#39;s Please Look After Mom won the closing Man Asian Literary Prize in 2012. Prior to it winning the prize, The Vegetarian had sold close to 20,000 copies in the nine years since its first publication. In June 2016, Time included the book in its list of best books of 2016\r\n', 'eac48e33a609e4a45fa95cf9a8b97490.jpg'),
(12, 'ruba', 'Rich People Problems', 'Kevin Kwan', 'When Nicholas Young hears that his grandmother, Su Yi, is on her deathbed, he rushes to be by her bedside--but he&#39;s not alone. It seems the entire Shang-Young clan has convened from all corners of the globe, ostensibly to care for their matriarch but truly to stake claim on the massive fortune that Su Yi controls.&nbsp;<br />\r\n<br />\r\nWith each family member secretly fantasizing about getting the keys to Tyersall Park--a trophy estate on 64 prime acres in the heart of Singapore--the place becomes a hotbed of intrigue and Nicholas finds himself blocked from entering the premises.&nbsp;<br />\r\n<br />\r\nAs relatives claw over heirlooms, Astrid Leong is at the center of her own storm, desperately in love with her old sweetheart Charlie Wu, but tormented by his ex-wife--a woman hell bent on destroying Astrid&#39;s reputation and relationship. Meanwhile Kitty Pong, married to billionaire Jack Bing, finds a formidable opponent in his fashionista daughter, Colette.\r\n', 'ecea2ab850a6868f46a47becbd56cf39.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_info`
--
ALTER TABLE `book_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
