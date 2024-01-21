-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 20. led 2024, 00:14
-- Verze serveru: 10.4.28-MariaDB
-- Verze PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `progblog`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `article_content` text NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `subtitle`, `article_content`, `article_image`, `article_status`, `created_at`) VALUES
(21, 1, 'Moderní vývoj s JavaScriptem', 'Rychlý průvodce nejnovějšími trendy ve světě JavaScriptu a moderního vývoje webových aplikací.', 'JavaScript, nejoblíbenější skriptovací jazyk na světě, stále roste na popularitě. Nové nástroje a frameworky usnadňují vývoj webových aplikací. V tomto článku se podíváme na několik klíčových trendů a technologií, které ovlivňují moderní vývoj.', 'IMG-65a001eca6eb17.92742229.png', 0, '2024-01-11 14:57:48'),
(22, 1, 'Python: Univerzální jazyk pro všechno', 'Proč Python získává stále větší popularitu ve světě programování a jak jej lze použít pro různé účely od webu po umělou inteligenci.', 'Python je jazyk, který získává oblibu díky své jednoduché syntaxi a všestrannosti. Od vývoje webových aplikací až po hluboké učení, Python je univerzální nástroj pro každého vývojáře. V tomto článku se podíváme na klíčové aspekty, které dělají z Pythonu tak silný jazyk.', 'IMG-65a002383ae020.25082355.jpg', 1, '2024-01-11 14:59:04'),
(23, 1, 'CSS Grid a Flexbox: Moderní layoutové techniky', 'Jak využít CSS Grid a Flexbox pro vytváření responzivního a moderního layoutu pro webové stránky a aplikace.', 'CSS Grid a Flexbox jsou mocné nástroje pro vytváření responzivního a flexibilního layoutu na webových stránkách. V tomto článku se naučíme, jak správně využívat oba tyto techniky a jak dosáhnout profesionálního vzhledu pro vaše webové projekty.', 'IMG-65a0026f6d05f7.48532048.jpg', 2, '2024-01-11 14:59:59'),
(24, 1, 'Efektivní správa paměti v jazyce C++', 'Tipy a triky pro správnou manipulaci s pamětí a zabránění únikům paměti ve vašich projektech v jazyce C++.', 'Správa paměti je kritickým prvkem v jazyce C++, a nesprávná manipulace s pamětí může vést k chybám a únikům paměti. V tomto článku se zaměříme na efektivní techniky správy paměti v jazyce C++ a poskytneme tipy, jak zabránit běžným chybám při práci s pamětí.', 'IMG-65a002bfdf03b5.15485887.png', 0, '2024-01-11 15:01:19'),
(25, 1, 'Vlákna a asynchronie v jazyce Java', 'Jak efektivně pracovat s vlákny a asynchronním programováním v jazyce Java a zlepšit výkon vaší aplikace.', 'Vlákna a asynchronie jsou klíčové koncepty v moderním programování. V tomto článku se zaměříme na to, jak efektivně pracovat s vlákny v jazyce Java a využívat asynchronních funkcí pro zlepšení výkonu vašich aplikací.', 'IMG-65a002dfa63564.03735865.png', 1, '2024-01-11 15:01:51'),
(26, 1, 'Svět virtuální reality: Vývoj s jazykem Unity', 'Podívejte se na fascinující svět virtuální reality a naučte se vytvářet vlastní VR aplikace pomocí jazyka Unity a C#.', 'Virtuální realita (VR) otevírá nové možnosti pro vývojáře. V tomto článku se zaměříme na vývoj VR aplikací pomocí jazyka Unity a C#. Naučíme se základy vytváření interaktivního a poutavého prostředí ve světě virtuální reality.', 'IMG-65a003854f6ff2.69864766.png', 2, '2024-01-11 15:04:37'),
(27, 1, 'Rychlý start s PHP: Vytvoření první webové aplikace', 'Průvodce vytvářením jednoduché webové aplikace pomocí PHP, HTML a CSS. Překonání začátečnických překážek.', 'PHP je skvělým jazykem pro vytváření webových aplikací. V tomto článku provedeme rychlý start s PHP a vytvoříme jednoduchou webovou aplikaci. Překonáme začátečnické překážky a ukážeme, jak snadné může být začít programovat ve PHP.', 'IMG-65a003afd34dd2.85751045.jpg', 1, '2024-01-11 15:05:19'),
(28, 1, 'Bezpečné webové stránky: Zabezpečení proti útokům SQL Injection', 'Důležité bezpečnostní tipy pro prevenci útoků SQL Injection ve vašich webových projektech. Ochrana před neoprávněným přístupem k databázím.', 'SQL Injection je jedním z nejčastějších útoků na webové stránky. V tomto článku se dozvíte, jak chránit své webové aplikace před SQL Injection útoky a jak efektivně zabezpečit přístup k databázím.', 'IMG-65a003cc0aab86.74517534.jpg', 1, '2024-01-11 15:05:48'),
(29, 1, 'Dynamické webové stránky s jQuery: Zjednodušte svůj kód', 'Jak využít knihovnu jQuery pro zlepšení interaktivity a dynamiky vašich webových stránek. Snadné manipulace s DOM a obsahem stránek.', 'jQuery je mocným nástrojem pro vývoj interaktivních webových stránek. V tomto článku se naučíte základy práce s jQuery a jak efektivně zjednodušit váš kód, abyste mohli lépe manipulovat s DOM a zvyšovat dynamiku svých webových stránek.', 'IMG-65a003e4db7b73.95510922.png', 0, '2024-01-11 15:06:12'),
(30, 1, 'Objektově orientované programování v Pythonu', 'Prohlédněte si výhody objektově orientovaného programování a jak je lze využít v jazyce Python pro lepší strukturu a organizaci kódu.', 'Objektově orientované programování (OOP) přináší mnoho výhod pro organizaci kódu a znovupoužitelnost. V tomto článku se zaměříme na principy OOP v jazyce Python a ukážeme, jak vytvořit objektově orientovaný kód pro efektivní vývoj.', 'IMG-65a003fa708d49.10063335.jpg', 1, '2024-01-11 15:06:34'),
(56, 1, 'Oprava sefe 2', 'FALSE NO NO NO', 'TESTE EL TESTE', 'hero-img-65a418d65f3943.35901083.jpg', 0, '2024-01-14 17:24:38'),
(57, 1, 'TEst', 'teast', 'atssat', 'JavaScript-65a47234a85709.92816680.png', 0, '2024-01-14 23:45:56'),
(58, 1, 'Objektově orientované programování v Pythonu', 'Prohlédněte si výhody objektově orientovaného programování a jak je lze využít v jazyce Python pro lepší strukturu a organizaci kódu.', 'Objektově orientované programování (OOP) přináší mnoho výhod pro organizaci kódu a znovupoužitelnost. V tomto článku se zaměříme na principy OOP v jazyce Python a ukážeme, jak vytvořit objektově orientovaný kód pro efektivní vývoj.', 'IMG-65a003fa708d49.10063335.jpg', 1, '2024-01-17 07:06:34'),
(59, 1, 'Nový článek', 'Nový článek 17.01.2024', 'Nový článekNový článekNový článekNový článekNový článekNový článekNový článekNový článekNový článekNový článekNový článek', 'Java-65a85c02a91d14.91572767.png', 2, '2024-01-17 23:00:18'),
(61, 1, 'Nový editor článek', 'Nový editor článek', 'Nový editor článek', 'JavaScript-65a9770b75de22.84688546.png', 2, '2024-01-18 19:07:55'),
(62, 1, 'Nový editor článek 2', 'Nový editor článek 2', 'Nový editor článek 2', 'hero-img-65a97716eee601.38953891.jpg', 2, '2024-01-18 19:08:06'),
(65, 2, 'Upravený title článku', 'tastsadsaasd', 'tastastastas', 'Java-65a97c1fd29411.61367663.png', 1, '2024-01-18 19:29:35');

-- --------------------------------------------------------

--
-- Struktura tabulky `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `article_id`, `comment_content`, `created_at`) VALUES
(5, 1, 23, ' I really appreciate the insights and perspective shared in this article. It\'s definitely given me something to think about and has helped me see things from a different angle. Thank you for writing and sharing!', '2024-01-13 14:09:17'),
(6, 1, 23, 'Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář Komentááář 2', '2024-01-13 14:09:17'),
(7, 2, 23, 'Bábuška', '2024-01-13 16:37:08'),
(8, 3, 23, 'Nový komentář', '2024-01-13 16:38:31');

-- --------------------------------------------------------

--
-- Struktura tabulky `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `likes`
--

INSERT INTO `likes` (`id`, `article_id`, `user_id`, `liked`) VALUES
(7, 21, 1, 0),
(8, 23, 1, 1),
(9, 21, 2, 1),
(10, 21, 3, 1),
(11, 25, 1, 1),
(12, 26, 1, 0),
(13, 22, 1, 1),
(14, 28, 1, 1),
(15, 27, 1, 0),
(16, 30, 1, 1),
(19, 58, 3, 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `message_open` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `article_id`, `message_content`, `message_open`, `created_at`) VALUES
(8, 1, 28, 'Špatně', 1, '2024-01-11 21:39:22'),
(9, 1, 23, 'fdsafsdsfdsdf', 1, '2024-01-11 21:39:22'),
(13, 1, 56, 'Toto se mi velice nelíbí bráško!', 1, '2024-01-14 17:25:23'),
(15, 2, 24, 'špatně editor se zlobí', 0, '2024-01-14 19:08:05'),
(16, 1, 56, 'Prostě je to špatně oprav to dík !', 1, '2024-01-14 21:33:56'),
(17, 1, 56, 'špatné', 1, '2024-01-14 21:35:12'),
(18, 1, 56, 'Hrůzostrašné sorry bráško', 1, '2024-01-14 23:12:45'),
(19, 1, 56, 'Udělej to znovu díky', 1, '2024-01-15 15:53:36'),
(20, 1, 57, 'Nic moc', 1, '2024-01-15 15:55:00'),
(21, 1, 21, 'Ne a ne a ne', 1, '2024-01-15 16:01:04'),
(22, 1, 21, 'Vidím velký špatný', 1, '2024-01-15 16:01:46');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$eSEq6iFeVTHcghaMzbIufeOpM9LXA6p/j1jr3BjC06MMs4nIcbU3q', 'avatar1.png', 'ADMIN'),
(2, 'Editor', 'editor@gmail.com', '$2y$10$bsnspX/esefRw1p/tzn30OFDWbRp5wDur8VKG3iE3CDT3YpK0fpqi', 'avatar2.png', 'EDITOR'),
(3, 'User', 'user@gmail.com', '$2y$10$76XIs17gq9vxpIdKBqk8r.WCPuQpjqY4dbnJxJ4/BBiZS5/jWvPDe', 'avatar3.png', 'USER');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexy pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comments_ibfk_1` (`article_id`);

--
-- Indexy pro tabulku `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `likes_ibfk_1` (`article_id`);

--
-- Indexy pro tabulku `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `messages_ibfk_2` (`article_id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pro tabulku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pro tabulku `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pro tabulku `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Omezení pro tabulku `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
