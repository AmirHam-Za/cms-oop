-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 04:49 PM
-- Server version: 10.6.16-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dragonen_my_cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(44, 'Career'),
(45, 'Sports'),
(46, 'International');

-- --------------------------------------------------------

--
-- Table structure for table `category_tag`
--

CREATE TABLE `category_tag` (
  `category_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT 'Mr. Commentor',
  `comment` text DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_id`, `created_at`) VALUES
(58, 'Alamin Shikder', 'The formatting rules are not configurable but are already optimized for the best possible output. Note that the ', 5, '2023-12-17 22:29:03'),
(207, 'Mr. Nayan Ali', 'Ipsum is that it has a more-or-less normal distribution of letters', 161, '2024-01-03 07:20:05'),
(208, 'Shaforaj Khan', 'English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years', 161, '2024-01-03 07:22:11'),
(216, 'development', 'With the integration of 5G, we can also expect the apps will be more', 164, '2024-01-04 19:03:44'),
(217, 'tech sector', 'wanting for a more AI embedded future. In 2024, these technologies', 164, '2024-01-04 19:04:15'),
(218, 'Microsoft', 'has also introduced a distinct web experience for Copilot, separate from the Bing platform.', 147, '2024-01-04 19:04:34'),
(219, 'Seaqua', 'Bangladeshi blue-tech startup, has raised USD six-figure foreign direct investment (FDI) from investors from the Middle East.', 163, '2024-01-04 19:10:00'),
(220, 'Mbappe', 'If I know what I want to do, why drag it out? It just doesnt make sense.', 126, '2024-01-04 19:14:20'),
(221, 'Rishad Hossain', 'the 21-year-old was able to show promise in the recently-concluded white ball series against New Zealand', 148, '2024-01-04 19:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `read_time` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `description`, `image`, `read_time`, `category_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(126, 'Mbappe undecided on his future', 'Paris St Germain forward Kylian Mbappe said he has not made up his mind about where he will play next season as his contract enters its final six months.\r\n\r\n\r\nMbappe said last year he would not renew his contract at PSG, which expires at the end of the 2023-24 season when he could leave Paris for free.\r\n\r\nGoogle News LinkFor all latest news, follow The Daily Stars Google News channel.\r\nThe France captain, who has long been linked with a move to Real Madrid, is now free to sign a pre-contract agreement with a new club.\r\n\r\nFirst of all, Im very, very, very motivated for this year. Its very important, Mbappe told reporters after PSGs 2-0 win over Toulouse in the French Super Cup final on Wednesday.\r\n\r\n\r\nAs I said, weve got titles to go after and weve already won one, so thats already done. After that, no, I havent made up my mind yet.\r\n\r\nBut in any case, with the agreement I made with the chairman (Nasser Al-Khelaifi) this summer it doesnt matter what I decide.\r\n\r\nWe managed to protect all parties and preserve the clubs serenity for the challenges ahead, which remains the most important thing. So well say its secondary.\r\n\r\n\r\nMedia reports in September said Mbappe had agreed to forego loyalty bonuses worth up to 100 million euros ($109.17 million) if he left PSG on a free transfer.\r\n\r\nIn 2022, Mbappe waited until May to announce a contract extension at PSG, just weeks before the transfer window opened. The 25-year-old said he may not leave it so late this time around.\r\n\r\nI think it was the end of May in 2022 because I didnt know until May, he added. If I know what I want to do, why drag it out? It just doesnt make sense.', 'uploads/9e118d96e6.png', 4, 45, 19, '2024-01-01 19:03:25', '2024-01-04 18:53:25'),
(147, 'Microsoft unveils Copilot app for iOS', 'In a swift follow-up to the recent introduction of the Copilot app on Android, Microsoft has extended its reach by launching the app for iOS and iPadOS. Both versions of the app are now available for download on the Apple App Store.\r\n\r\n\r\nThe app provides users with access to Microsoft Copilot, formerly known as Bing Chat, and operates in a manner similar to OpenAIs ChatGPT mobile app. Beyond answering queries, email drafting, and text summarization, the app integrates with the text-to-image generator DALL-E3, enabling users to create images with words.\r\n\r\nGoogle News LinkFor all latest news, follow The Daily Stars Google News channel.\r\nCopilot also allows users to access GPT-4, the latest large language model (LLM) developed by OpenAI, without a subscription fee.\r\n\r\nAlongside the apps rollout on Android and Apple devices, Microsoft has also introduced a distinct web experience for Copilot, separate from the Bing platform.', 'uploads/076c2b6c49.png', 3, 44, 18, '2024-01-01 19:28:56', '2024-01-04 18:49:15'),
(148, 'No one will spoon-feed you anything', 'The arrival of Rishad Hossain may as well provide the Bangladesh team management, which has been longing for a regular leg-spinner for decades, a sigh of relief after the 21-year-old was able to show promise in the recently-concluded white ball series against New Zealand. Rishads knack for chipping in with crucial wickets, complimented only by his ability to contain runs, was on display against the Kiwis. During a candid conversation with Mazhar Uddin of The Daily Star, the shy leggie spoke about his bowling, future plans among other topics. The excerpts of the interview are given below:', 'uploads/9da5ee0092.png', 1, 45, 34, '2024-01-01 19:31:06', '2024-01-04 18:46:35'),
(161, 'It is a long established fact that a reader ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/f4fe471887.png', 4, 45, 19, '2024-01-03 06:56:35', '2024-01-03 06:56:35'),
(163, 'Bangladeshi blue-tech startup Seaqua raises', 'Seaqua, a Bangladeshi blue-tech startup, has raised USD six-figure foreign direct investment (FDI) from investors from the Middle East. Founded in 2022, Seaqua is a startup that aims to digitise Bangladeshs fisheries and aquaculture industry.\r\n\r\n\r\nAccording to a press release by Seaqua, the company has introduced a value chain designed to minimise wastage and enhance efficiency in fisheries and aquaculture. They also plan on empowering local fisheries by helping them eliminate traditional inefficiencies through modern technology. \r\n\r\nGoogle News LinkFor all latest news, follow The Daily Stars Google News channel.\r\nThe startup features real-time data integration for catch records and a system that provides retailers with accurate, up-to-date information. It also uses use blockchain technology for traceability maps. The funding will help catalyse Seaquas mission to expand its reach both environmentally and economically, adds the press release. \r\n\r\n', 'uploads/cfa3fead3d.png', 3, 44, 18, '2024-01-04 18:56:01', '2024-01-04 18:56:01'),
(164, '5 mobile app development trends to look out for in 2024', 'The realm of mobile app development is an ever-evolving domain in the tech sector. Looking forward to 2024, we delve into the most promising trends expected to redefine the mobile app experience in the upcoming year:\r\nGoogle News LinkFor all latest news, follow The Daily Stars Google News channel.\r\n5G was one of the most trending topics of 2023. As we dive into 2024, this year may result in the adaptation of 5G with various countries implementing proper infrastructure for 5G network supporting towers. \r\nPromising supercharged connectivity, 5G is expected to usher in faster data transfer speeds, reduced latency, and support for higher-resolution content. The expanded capabilities of 5G will bring entirely new app functionalities and experiences which may result in the advancements in almost all industries.\r\nArtificial Intelligence (AI) and Machine Learning (ML)\r\nThe rise of platforms like ChatGPT has left the users wanting for a more AI embedded future. In 2024, these technologies are expected to seamlessly integrate into mobile applications, enhancing user experiences through personalisation, intelligent decision-making, and heightened security. \r\nAdvanced features like AI-generated images, chatbots, voice assistants, facial recognition, and natural language processing will become more prevalent, making apps smarter and more user-friendly. With the integration of 5G, we can also expect the apps will be more accessible.', 'uploads/4cf2ae6f4c.png', 2, 46, 18, '2024-01-04 19:01:12', '2024-01-04 19:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `header_footer`
--

CREATE TABLE `header_footer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_footer`
--

INSERT INTO `header_footer` (`id`, `name`, `logo_path`) VALUES
(56, 'Admin', 'uploads/59c55c8a32.png');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(18, 'Programming'),
(19, 'Football'),
(21, 'Travelling'),
(34, 'Cricket');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `v_token` varchar(255) NOT NULL,
  `v_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `v_token`, `v_status`, `created_at`) VALUES
(33, 'Syed Amir Hamza', 'hamza.com.bd@gmail.com', '01978515959', '25d55ad283aa400af464c76d713c07ad', '32b6587b738ff5582191d245130c559d', 1, '2023-12-29 07:10:29'),
(41, 'Admin', 'admin@gmail.com', '123456789', '4b9db269c5f978e1264480b0a7619eea', '3faf2d0565f3ec7883093f3271116e32', 1, '2024-01-03 09:31:00'),
(43, 'Amir', 'amir@gmail.com', '123456789', '8c10a02a0928511c460bd65e9ec59d0a', 'd6d04e44bb82a9f49dde9452b5eed038', 1, '2024-01-04 19:15:38'),
(44, 'Amir', 'amir@gnmail.com', '12345667889', '25f9e794323b453885f5181f1b624d0b', '1e185a878450e30df3b9505a44712b8d', 1, '2024-01-04 19:34:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_tag`
--
ALTER TABLE `category_tag`
  ADD PRIMARY KEY (`category_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `header_footer`
--
ALTER TABLE `header_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `header_footer`
--
ALTER TABLE `header_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_tag`
--
ALTER TABLE `category_tag`
  ADD CONSTRAINT `category_tag_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
