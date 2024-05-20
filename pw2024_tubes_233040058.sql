-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2024 at 12:23 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040058`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`) VALUES
(1, 'Teknologi'),
(2, 'Sains'),
(3, 'Seni'),
(4, 'Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int NOT NULL,
  `id_category` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `excerpt` text,
  `body` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `id_category`, `id_user`, `title`, `image`, `excerpt`, `body`, `created_at`, `updated_at`) VALUES
(23, 1, 10, 'Ini Postingan ke 1', '664b395add5d1.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto minus sequi optio quidem repudiandae voluptatum dolorum consequuntur at inventore perferendis?', '<h1><strong><em>Lorem ipsum</em></strong><strong> dolor sit, amet consectetur adipisicing elit.&nbsp;</strong></h1><div><br>Iusto corrupti aut adipisci pariatur eaque consequatur sapiente nihil at facere! Iste error, recusandae molestias asperiores voluptates provident obcaecati mollitia quisquam consectetur explicabo porro perspiciatis! Quam eos veniam, placeat natus corrupti exercitationem perspiciatis maiores. Rerum consequuntur modi perspiciatis neque doloribus atque eum distinctio facere corporis minus nihil, cumque veritatis eius laboriosam quidem incidunt ut magnam tempora dolor, dignissimos sequi voluptate? Harum consectetur fugiat sed numquam aliquid odio rem in repellat laudantium ea eveniet, pariatur blanditiis est? Fugiat dolorem distinctio aperiam repellendus magni in modi libero sit deserunt non ex sed blanditiis consequuntur facilis eius, suscipit nesciunt?&nbsp;<br><br>Quibusdam mollitia quos corporis dignissimos obcaecati alias, libero accusamus error omnis iure totam saepe molestias necessitatibus suscipit voluptatibus soluta exercitationem, expedita velit tenetur! Sit voluptatum nobis maxime, distinctio odio placeat temporibus magnam aperiam esse velit perferendis tenetur, rem ea, optio quisquam atque. Exercitationem, obcaecati voluptas blanditiis at quasi, quibusdam accusamus quisquam eaque omnis pariatur quo totam libero ut praesentium temporibus velit nesciunt earum commodi! Ad aliquid aliquam enim praesentium quae dicta unde saepe voluptate cumque, quaerat quisquam magnam culpa. Ut amet tempora,<br><br>&nbsp;laudantium doloremque incidunt reprehenderit nesciunt cumque quaerat? Ullam assumenda, eveniet voluptates modi incidunt pariatur eligendi maiores. Dignissimos, eius soluta laudantium sint tenetur nihil, eligendi vitae itaque cumque, commodi praesentium. Id recusandae obcaecati illo iste maiores eaque voluptas, inventore porro quisquam officiis veritatis laudantium assumenda reprehenderit dolorum possimus! Harum ratione eos excepturi, non sed iusto esse ea error quas ullam id est ipsa molestiae perspiciatis.</div>', '2024-05-20 11:51:54', '2024-05-20 11:51:54'),
(24, 3, 10, 'Ini Postingan ke 2', '664b39885a3c0.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto minus sequi optio quidem repudiandae voluptatum dolorum consequuntur at inventore perferendis?', '<h1><strong><em>Lorem ipsum 2</em></strong><strong> dolor sit, amet consectetur adipisicing elit.&nbsp;</strong></h1><div><br>Iusto corrupti aut adipisci pariatur eaque consequatur sapiente nihil at facere! Iste error, recusandae molestias asperiores voluptates provident obcaecati mollitia quisquam consectetur explicabo porro perspiciatis! Quam eos veniam, placeat natus corrupti exercitationem perspiciatis maiores. Rerum consequuntur modi perspiciatis neque doloribus atque eum distinctio facere corporis minus nihil, cumque veritatis eius laboriosam quidem incidunt ut magnam tempora dolor, dignissimos sequi voluptate? Harum consectetur fugiat sed numquam aliquid odio rem in repellat laudantium ea eveniet, pariatur blanditiis est? Fugiat dolorem distinctio aperiam repellendus magni in modi libero sit deserunt non ex sed blanditiis consequuntur facilis eius, suscipit nesciunt?&nbsp;<br><br>Quibusdam mollitia quos corporis dignissimos obcaecati alias, libero accusamus error omnis iure totam saepe molestias necessitatibus suscipit voluptatibus soluta exercitationem, expedita velit tenetur! Sit voluptatum nobis maxime, distinctio odio placeat temporibus magnam aperiam esse velit perferendis tenetur, rem ea, optio quisquam atque. Exercitationem, obcaecati voluptas blanditiis at quasi, quibusdam accusamus quisquam eaque omnis pariatur quo totam libero ut praesentium temporibus velit nesciunt earum commodi! Ad aliquid aliquam enim praesentium quae dicta unde saepe voluptate cumque, quaerat quisquam magnam culpa. Ut amet tempora,<br><br>&nbsp;laudantium doloremque incidunt reprehenderit nesciunt cumque quaerat? Ullam assumenda, eveniet voluptates modi incidunt pariatur eligendi maiores. Dignissimos, eius soluta laudantium sint tenetur nihil, eligendi vitae itaque cumque, commodi praesentium. Id recusandae obcaecati illo iste maiores eaque voluptas, inventore porro quisquam officiis veritatis laudantium assumenda reprehenderit dolorum possimus! Harum ratione eos excepturi, non sed iusto esse ea error quas ullam id est ipsa molestiae perspiciatis.</div><div><br></div>', '2024-05-20 11:52:40', '2024-05-20 11:52:40'),
(25, 2, 11, 'Ini postingan ke satu dari user2', '664b39d2a56e2.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto minus sequi optio quidem repudiandae voluptatum dolorum consequuntur at inventore perferendis?', '<h1><strong><em>Lorem ipsum 3</em></strong><strong> dolor sit, amet consectetur adipisicing elit.&nbsp;</strong></h1><div><br>Iusto corrupti aut adipisci pariatur eaque consequatur sapiente nihil at facere! Iste error, recusandae molestias asperiores voluptates provident obcaecati mollitia quisquam consectetur explicabo porro perspiciatis! Quam eos veniam, placeat natus corrupti exercitationem perspiciatis maiores. Rerum consequuntur modi perspiciatis neque doloribus atque eum distinctio facere corporis minus nihil, cumque veritatis eius laboriosam quidem incidunt ut magnam tempora dolor, dignissimos sequi voluptate? Harum consectetur fugiat sed numquam aliquid odio rem in repellat laudantium ea eveniet, pariatur blanditiis est? Fugiat dolorem distinctio aperiam repellendus magni in modi libero sit deserunt non ex sed blanditiis consequuntur facilis eius, suscipit nesciunt?&nbsp;<br><br>Quibusdam mollitia quos corporis dignissimos obcaecati alias, libero accusamus error omnis iure totam saepe molestias necessitatibus suscipit voluptatibus soluta exercitationem, expedita velit tenetur! Sit voluptatum nobis maxime, distinctio odio placeat temporibus magnam aperiam esse velit perferendis tenetur, rem ea, optio quisquam atque. Exercitationem, obcaecati voluptas blanditiis at quasi, quibusdam accusamus quisquam eaque omnis pariatur quo totam libero ut praesentium temporibus velit nesciunt earum commodi! Ad aliquid aliquam enim praesentium quae dicta unde saepe voluptate cumque, quaerat quisquam magnam culpa. Ut amet tempora,<br><br>&nbsp;laudantium doloremque incidunt reprehenderit nesciunt cumque quaerat? Ullam assumenda, eveniet voluptates modi incidunt pariatur eligendi maiores. Dignissimos, eius soluta laudantium sint tenetur nihil, eligendi vitae itaque cumque, commodi praesentium. Id recusandae obcaecati illo iste maiores eaque voluptas, inventore porro quisquam officiis veritatis laudantium assumenda reprehenderit dolorum possimus! Harum ratione eos excepturi, non sed iusto esse ea error quas ullam id est ipsa molestiae perspiciatis.</div><div><br></div>', '2024-05-20 11:53:54', '2024-05-20 11:53:54'),
(26, 4, 11, 'Ini postingan ke 2 dari user2', '664b3a0f48670.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto minus sequi optio quidem repudiandae voluptatum dolorum consequuntur at inventore perferendis?', '<h1><strong><em>Lorem ipsum 4</em></strong><strong> dolor sit, amet consectetur adipisicing elit.&nbsp;</strong></h1><div><br>Iusto corrupti aut adipisci pariatur eaque consequatur sapiente nihil at facere! Iste error, recusandae molestias asperiores voluptates provident obcaecati mollitia quisquam consectetur explicabo porro perspiciatis! Quam eos veniam, placeat natus corrupti exercitationem perspiciatis maiores. Rerum consequuntur modi perspiciatis neque doloribus atque eum distinctio facere corporis minus nihil, cumque veritatis eius laboriosam quidem incidunt ut magnam tempora dolor, dignissimos sequi voluptate? Harum consectetur fugiat sed numquam aliquid odio rem in repellat laudantium ea eveniet, pariatur blanditiis est? Fugiat dolorem distinctio aperiam repellendus magni in modi libero sit deserunt non ex sed blanditiis consequuntur facilis eius, suscipit nesciunt?&nbsp;<br><br>Quibusdam mollitia quos corporis dignissimos obcaecati alias, libero accusamus error omnis iure totam saepe molestias necessitatibus suscipit voluptatibus soluta exercitationem, expedita velit tenetur! Sit voluptatum nobis maxime, distinctio odio placeat temporibus magnam aperiam esse velit perferendis tenetur, rem ea, optio quisquam atque. Exercitationem, obcaecati voluptas blanditiis at quasi, quibusdam accusamus quisquam eaque omnis pariatur quo totam libero ut praesentium temporibus velit nesciunt earum commodi! Ad aliquid aliquam enim praesentium quae dicta unde saepe voluptate cumque, quaerat quisquam magnam culpa. Ut amet tempora,<br><br>&nbsp;laudantium doloremque incidunt reprehenderit nesciunt cumque quaerat? Ullam assumenda, eveniet voluptates modi incidunt pariatur eligendi maiores. Dignissimos, eius soluta laudantium sint tenetur nihil, eligendi vitae itaque cumque, commodi praesentium. Id recusandae obcaecati illo iste maiores eaque voluptas, inventore porro quisquam officiis veritatis laudantium assumenda reprehenderit dolorum possimus! Harum ratione eos excepturi, non sed iusto esse ea error quas ullam id est ipsa molestiae perspiciatis.</div><div><br></div>', '2024-05-20 11:54:55', '2024-05-20 11:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `name_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `username`, `email`, `password`, `role`) VALUES
(9, 'admin', 'admin', 'admin1@example.com', '$2y$10$5AmnRLFZ6yk6yiOLfWj1Zeq1jjauKgnW1qHXmLDuOsDxcVIj93x62', 'admin'),
(10, 'user', 'user', 'users@mail.com', '$2y$10$QLYAq68eVaxfqEUfTOA/Q.RTtD.UBk/emePqxeNx12dj.lxEZmJ0K', 'user'),
(11, 'User Alexxxxxx', 'user2', 'users2@mail.com', '$2y$10$s2izWSJJqPUmvaShEo3dyug68akXS9rtXDJkYXmGOBkxy/LhDc0ku', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `category_id` (`id_category`),
  ADD KEY `user_id` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
