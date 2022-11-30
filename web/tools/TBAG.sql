-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2022 at 08:44 AM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TBAG`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `header` text NOT NULL,
  `abstract` text NOT NULL,
  `content` text NOT NULL,
  `voices` int(11) NOT NULL,
  `journalid` int(11) NOT NULL,
  `status` enum('new','reviewed','approved','declined') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `header`, `abstract`, `content`, `voices`, `journalid`, `status`) VALUES
(1, 'Towards the Solution of Metrics in a Model of Cosmic Rays (Including Eternal Small Black Holes at the Center of the Galaxy)', 'in this paper, we solve charges in type IIA strings. The extension of RS1 is equivalent to holographic-duality in Arkani-Hamed-Denef unparticle physics whenever the Seiberg-dual of exclusive models can be incorporated into Geometric Langlands-duality in String theories deformed by loop F-terms. Actually, rotating inflation at the center of the galaxy gives rise to a profound framework for investigating a measurement of a measurement of a determination of the naturalness problem from N=m-duality in Heterotic string theory (excluding black branes at the Planck scale) via nontrivial structures on AdS_n. Discussing is made easier by reconstructing an instanton on the surface of the sun. A key part of this analysis therefore is generalized inflation. Our results demonstrate that divisors in String Theory on symmetric spaces of \\Z^n holonomy fibered over the near horizon geometry of a H_6(dS_n,\\mathbb{H}) orbifold of S^m are equivalent to m-dimensional black holes formed from collapse at 5 loops.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut molestie porttitor sem vel elementum. Sed egestas, lectus at hendrerit porttitor, est est feugiat ante, id sodales leo quam malesuada leo. Proin malesuada lobortis orci, eu bibendum orci faucibus vitae. Donec placerat erat nec massa fermentum, eget luctus sapien convallis. Aliquam quis maximus ante, id porta erat. Etiam at augue id nunc bibendum pretium pretium a arcu. Donec sit amet dolor vel nisl porttitor pellentesque non at odio. Nullam odio urna, imperdiet ut orci ut, finibus maximus orci. Quisque vel ligula ipsum.\r\n\r\nSuspendisse ut lorem vel ex volutpat molestie. Mauris gravida viverra mattis. Nam dui nisi, lacinia vitae viverra sed, ornare sit amet ante. Morbi ornare metus vitae orci dapibus, eget ultricies nisl accumsan. Nam posuere, nibh quis pulvinar facilisis, massa nunc pretium sem, a malesuada justo quam et ex. Pellentesque id quam vitae odio faucibus mollis vitae eu purus. Duis vehicula lacus sapien, auctor bibendum nibh condimentum a. Etiam eros orci, tempor sed tempor a, euismod id quam. Nullam neque massa, malesuada in tempus nec, luctus at purus. Quisque sed blandit tortor, vel ornare ex. Integer mi nisl, pharetra in tincidunt at, maximus et neque. Suspendisse placerat ac ipsum sed accumsan. Integer consectetur finibus libero, accumsan iaculis ligula gravida ac. Aliquam risus tellus, blandit et venenatis sodales, accumsan eget ligula. Maecenas lorem ipsum, congue a elit ut, rutrum condimentum magna.\r\n\r\nMaecenas nec odio nibh. Nullam purus purus, imperdiet quis euismod et, suscipit id ligula. Aenean varius fermentum dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ipsum sapien, facilisis a nisi at, facilisis finibus sem. Phasellus in felis arcu. In luctus quis quam vitae lobortis. Nam sed lectus quis risus luctus auctor. Phasellus quis nulla quis ex vestibulum fermentum. Suspendisse a ipsum et enim sagittis ullamcorper. Curabitur non pellentesque odio. Curabitur convallis velit tellus, vel faucibus dolor pulvinar quis. Maecenas dapibus, magna vel malesuada aliquam, ante urna tristique metus, ac dignissim mi lectus sit amet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst.\r\n\r\nMorbi vel ipsum eu neque bibendum luctus. Pellentesque nec pellentesque lectus. Fusce lacinia nunc a leo auctor suscipit. Aenean libero nulla, iaculis id ligula hendrerit, ultricies vulputate libero. Aenean malesuada quam vulputate purus laoreet, semper mattis neque finibus. Vivamus bibendum dictum eros, a convallis lacus pharetra sed. Ut aliquam tempor risus. Cras cursus massa vel est egestas, ut interdum elit eleifend. Nulla vel ligula id turpis egestas facilisis a et urna. Maecenas quis ex nec lorem aliquet molestie.\r\n\r\nEtiam vel neque metus. Aliquam in nunc tincidunt, varius nulla non, molestie nulla. Phasellus tristique non risus eu malesuada. Cras eleifend mauris vitae lacus molestie volutpat. Fusce volutpat sodales sem, et porta mi ultricies ac. Nam hendrerit, arcu non pulvinar cursus, justo risus pretium risus, a lobortis metus libero viverra turpis. In metus tortor, tempor et molestie a, tincidunt quis diam. Praesent sollicitudin posuere mollis. Etiam eu fermentum mauris, id tincidunt arcu. In a dui commodo, venenatis dolor et, rutrum libero. Mauris vehicula mi id aliquam accumsan. Aliquam facilisis eleifend tellus et auctor.', 0, 1, 'approved'),
(2, 'Schwarzschild Black Holes Formed From Collapse During Inflation', 'Analyzing thermodynamics is generalizing type IIA strings. Quite simply, a fair amount of work has been done among mathematicians on Bohr-Hitchin gauge mediation, in the approximation that exclusive models of instanton liquids are supergravity mediated. Jackiw-Teitelboim gravity is also analyzed. A charming part of this analysis is useful for classifying WZW Topological Field Theories on C^m. Leptons are momentum-dependent.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis efficitur mi. Quisque gravida, leo non fringilla sollicitudin, odio arcu consequat tortor, eget rhoncus nisi mi at mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hac habitasse platea dictumst. Donec finibus convallis mauris in dignissim. Nulla facilisi. Aenean in nibh eget lacus bibendum consectetur. Quisque ut maximus mi, sed luctus augue. Nulla placerat a nisl sed consequat. Fusce metus est, gravida eget mauris in, tincidunt condimentum felis.\r\n\r\nUt fringilla, enim a eleifend maximus, augue erat venenatis est, quis gravida elit neque quis justo. Sed ut lacus velit. Fusce tellus mauris, consequat sit amet molestie vel, blandit non dolor. Nullam pharetra at metus ut cursus. Aenean id lacus tempor, rhoncus neque ac, rutrum nisl. Duis quis nulla in odio mattis mattis id a leo. Mauris rutrum sem nulla, bibendum porta sapien lobortis ac. Duis eget dui orci. Donec tempor mi in augue maximus faucibus. Aenean ac iaculis neque. Proin quis rutrum est. Integer vel suscipit eros. Aliquam turpis enim, fringilla eget feugiat quis, sagittis vitae erat.\r\n\r\nUt egestas ac risus vel fermentum. Etiam in blandit turpis. Nullam commodo metus ut lorem convallis fringilla. Duis ut quam vel risus tempus sodales vel quis orci. Sed consectetur nunc nec neque suscipit, a elementum nibh tincidunt. Duis eu posuere magna. In tempus felis et libero blandit posuere in id massa. Aliquam euismod, risus quis consectetur commodo, arcu dui egestas metus, non porttitor arcu tellus ac urna.\r\n\r\nSuspendisse vitae nunc non massa egestas accumsan. Nullam congue ex at metus consequat, vel sagittis neque consectetur. Sed commodo non massa eget aliquam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam rutrum magna tortor, sed feugiat sapien mattis vel. Duis id nisl ipsum. Sed in erat pretium, consectetur eros ac, finibus odio.\r\n\r\nMauris massa odio, vehicula et egestas ac, mollis vel nisi. Vivamus blandit massa libero, at lobortis lectus sollicitudin a. Phasellus eget metus ut orci dictum condimentum ut vitae nisi. Maecenas sed cursus est. Ut ullamcorper enim ac pellentesque condimentum. Vivamus id porta purus. Curabitur tellus arcu, placerat at orci quis, tristique eleifend elit. Maecenas placerat lorem odio, eu pellentesque ipsum euismod et. Morbi sollicitudin congue nulla. Nullam scelerisque augue id erat molestie laoreet. Pellentesque pharetra ultrices ipsum ut pulvinar. Vestibulum purus lacus, lacinia ac urna faucibus, posuere tincidunt metus. Donec molestie pretium mi. Aliquam a dolor at urna pharetra pellentesque at ac lectus. Donec nec sagittis mi.', 0, 1, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `place` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `userid`, `articleid`, `place`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 2),
(3, 3, 1, 1),
(4, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `number`, `year`) VALUES
(1, 2, 2022),
(2, 1, 2022),
(3, 2, 2021),
(4, 1, 2021),
(5, 2, 2020),
(6, 1, 2020),
(7, 2, 2019),
(8, 1, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `shown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `articleid` int(11) NOT NULL,
  `isaccepted` tinyint(1) NOT NULL,
  `contenct` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','author','editor','chiefedior','reader','reviewer') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `role`, `password`) VALUES
(1, 'Josef', 'Wayne', 'JosefWayne@gmail.com', 'author', '$2y$10$XdrTucwBw3somYkrlEGZVuQfpxNVxLAaXct7XAuIAYdYn7dIE7U4u'),
(2, 'Barbora', 'Wayne', 'BarboraWayne@gmail.com', 'author', '$2y$10$foDo7jDaMPjyvfhEOgQ3we0gNs9zrIvVxgjiuo09pwXvE8Tx9pQU2'),
(3, 'Martin', 'Doe', 'MartinDoe@gmail.com', 'author', '$2y$10$XjGmlFz/oCtFfTTdRm0POenRpZkA1mNDmOhLa5851uUMZHwap5a4S'),
(4, 'Josef', 'Doe', 'JosefDoe@gmail.com', 'author', '$2y$10$NJ5ZiQGOy6PNp/IcWfD2De6Jt19nG3t9pD9zQvnk66vtcMm4QFfdm'),
(5, 'Peter', 'Wayne', 'PeterWayne@gmail.com', 'author', '$2y$10$rsjmP.encWFhO/LLBdar.O/nGXqe5UfFjjVja.iDHES09wcbzI/Wa'),
(6, 'John', 'Kent', 'JohnKent@gmail.com', 'author', '$2y$10$6FT/8fHKdy3YWpseOwW3muJciJC95az6z4RwPqCcNEaoem46mpfim'),
(7, 'Petr', 'Stark', 'PetrStark@gmail.com', 'author', '$2y$10$Lx20rLken8ck4YPsnmS7jOAcb33pNurkR8AaccA8d4HSQ0e0cE0Iy'),
(8, 'Mary', 'Doe', 'MaryDoe@gmail.com', 'author', '$2y$10$Fpk2cUXCg4hJuzJ.2y5YeO9r7zA8NROUJ1msaNGGTFm8/4lZuCGam'),
(9, 'Barbora', 'Maximoff', 'BarboraMaximoff@gmail.com', 'author', '$2y$10$t27aNWa./hgYESm7lIcSz.nZoh7sBvqZC1vGuyfH5E3cqF0sYX3QS'),
(10, 'Josef', 'Romanoff', 'JosefRomanoff@gmail.com', 'author', '$2y$10$51NcDZfKyKlh7NXEg4xZEOgV6KEHl3qH7ZCuyauzwh2E3FAvssnyC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journalid` (`journalid`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articleid` (`articleid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviewerid` (`reviewerid`),
  ADD KEY `articleid` (`articleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`journalid`) REFERENCES `journal` (`id`);

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_ibfk_1` FOREIGN KEY (`articleid`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `authors_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`reviewerid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`articleid`) REFERENCES `articles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
