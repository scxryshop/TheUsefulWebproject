-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 18. Aug 2022 um 13:00
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `websitehacks`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `categories`
--

CREATE TABLE `categories` (
  `PKCategories` int(2) NOT NULL,
  `name` varchar(19) DEFAULT NULL,
  `icon` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `categories`
--

INSERT INTO `categories` (`PKCategories`, `name`, `icon`) VALUES
(1, 'Audio', NULL),
(2, 'Fun', NULL),
(3, 'Explore', NULL),
(4, 'Food & Health', NULL),
(5, 'Series & Movies', NULL),
(6, 'Illegal', NULL),
(7, 'Everyday Life', NULL),
(8, 'School & Work', NULL),
(9, 'Tracking', NULL),
(10, 'Edit Photos & Video', NULL),
(11, 'Games', NULL),
(12, 'PDF & Files', NULL),
(13, 'Roadtrip', NULL),
(14, 'Programming', NULL),
(15, '3D-printing', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `links`
--

CREATE TABLE `links` (
  `PKLinks` int(11) NOT NULL,
  `name` varchar(27) DEFAULT NULL,
  `address` varchar(108) DEFAULT NULL,
  `clicks` int(11) NOT NULL,
  `searches` int(11) NOT NULL,
  `FKCategories` int(2) DEFAULT NULL,
  `description` varchar(126) DEFAULT NULL,
  `keywords` varchar(181) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `links`
--

INSERT INTO `links` (`PKLinks`, `name`, `address`, `clicks`, `searches`, `FKCategories`, `description`, `keywords`) VALUES
(1, 'Text To Speech', 'https://fakeyou.com', 0, 0, 1, 'Convert text into voice using different filters', 'Speech, Text, Convert, Filter, Voice, Audio, Change'),
(2, 'Voice Changer', 'https://voicechanger.io', 0, 0, 1, 'Distort your voice or audio', 'Speech, Text, Convert, Filter, Voice, Audio, Change'),
(3, 'Relaxing Sounds', 'https://noises.online', 0, 0, 1, 'Listen to relaxing sounds', 'Listen, Relax, Sound, Sea, Rain, Raining, Shore, Sound, Thunderstorms, Calm, Sleep'),
(4, 'Edit Audio', 'https://vocalremover.org', 2, 0, 1, 'Edit audio files', 'Cut, Trim, Remove, Edit, Music'),
(5, 'Radio Worldwide', 'http://radio.garden', 0, 0, 1, 'Listen and discover radio stations around the world', 'Radio, Music, World, Play, Songs, Europe, USA, Station, National'),
(6, 'Time Maschine', 'https://radiooooo.com', 0, 0, 1, 'The musical time maschine', 'Radio, Music, World, Play, Songs, Europe, USA, Station, National'),
(7, 'Geek Prank', 'https://geekprank.com', 0, 0, 2, 'Fun website to play around with WindowsXP', 'Prank, Windows, Screen, Crack, Fun, Fake'),
(8, 'Quickdraw', 'https://quickdraw.withgoogle.com', 0, 0, 2, 'Let an AI guess your drawings', 'Drawings, Paint, Guess'),
(9, 'Autodraw', 'https://www.autodraw.com', 0, 0, 2, 'Let an AI complete your drawings', 'Drawings, Paint, Guess'),
(10, 'TrueSize', 'https://www.thetruesize.com/', 0, 0, 2, 'True size of a country', 'Size, Country, Land, Compared, Comparisson'),
(11, 'Name Facts', 'https://forebears.io', 0, 0, 3, 'Discover facts about your name', 'Origin, Where, Nationality, Surname, Date, Age, Time'),
(12, 'Bomb Test', 'https://outrider.org/nuclear-weapons/interactive/bomb-blast', 0, 0, 3, 'Experience the power of a nuclear blast in your area', 'Nuclear, Bomb, Blast, Radiation, Fallout, Test, Deaths, Fireball, Shock Wave, Heat, Tsar, Little Boy, North Korea, USA'),
(13, 'Climate Change', 'https://outrider.org/climate-change/interactive/climate-change#local', 0, 0, 3, 'Explore the impacts of climate change', 'Climate Change, Global Warming, Float, Wildfire, Drought, Effects, Hot, Global, Earth'),
(14, 'How Hot Could It Be', 'https://www.nationalgeographic.com/magazine/graphics/see-how-your-citys-climate-might-change-by-2070-feature', 0, 0, 3, 'Explore how hot it will be in 2070', 'Climate Change, Global Warming, Float, Wildfire, Drought, Effects, Hot, Global, Earth'),
(15, 'Stellarium', 'https://stellarium-web.org', 0, 0, 3, 'Online planetarium', 'Night, Sky, Planets, Stars, Sun, Galaxys, Black Holes, Star sign, Moon, Space'),
(16, 'Window Swap', 'https://www.window-swap.com', 0, 0, 3, 'Open a window somewhere in the world', 'Window, Global, Globe, Around, See, Neighbour'),
(17, 'Eat This Much', 'https://www.eatthismuch.com', 0, 0, 4, 'Create personalized meal plans based on your diet and nutritional goals', 'Food, Recipes, Meal, Suggestion, Healthy, Carbons, Cook, Easy, Step by step'),
(18, 'Ice Cream Maschine Working?', 'https://mcbroken.com', 0, 0, 4, 'Check is the McDonald\'s ice cream maschine broken?', 'McDonalds, Broken, Area'),
(19, 'Tasteatlas', 'https://www.tasteatlas.com', 0, 0, 4, 'Discover local ingredients and traditional dishes', 'Food, Recipes, Meal, Suggestion, Healthy, Carbons, Cook, Easy, Step by step'),
(20, 'Copy The Menu', 'https://copykat.com', 1, 0, 4, 'Find all of your favorite restaurant recipes', 'Food, Recipes, Meal, Suggestion, Healthy, Carbons, Cook, Brands, Favourite, Easy, Step by step'),
(21, 'Yummly', 'https://www.yummly.com', 0, 0, 4, 'Find new dishes', 'Food, Recipes, Meal, Suggestion, Healthy, Carbons, Cook, Easy, Step by step'),
(22, 'Musclewiki', 'https://musclewiki.com', 0, 0, 4, 'Find exercises for each muscle', 'Workout, Body, Parts, Exercise, Home, Easy'),
(23, 'My90sTV', 'https://my90stv.com', 0, 0, 5, 'Watch TV and series from the 90s', 'Old, See, Television'),
(24, 'Playphrase', 'https://www.playphrase.me/', 0, 0, 5, 'Find the right movie scene for every phrase', 'Quote, Actor, Scene'),
(25, 'A Good Movie To Watch', 'https://agoodmovietowatch.com', 0, 0, 5, 'Find the best things to watch', 'Film, Best, Happy, Sad, Horror, Drama, Hollywood, Suggestion, Favourite, Awesome, Amazing, Chill, Netflix, Disney, Amazon Prime, Night'),
(26, 'Soap2day', 'https://soapgate.org', 0, 0, 6, 'Watch many movies and series for free', 'Film, Best, Happy, Sad, Horror, Drama, Hollywood, Suggestion, Favourite, Awesome, Amazing, Chill, Netflix, Disney, Amazon Prime, Night, Free, Illigal,'),
(27, 'Zoro Anime', 'https://zoro.to/home', 0, 0, 6, 'Watch Anime for free', 'Film, Best, Happy, Sad, Horror, Drama, Hollywood, Suggestion, Favourite, Awesome, Amazing, Chill, Netflix, Disney, Amazon Prime, Night, Free, Illigal, Anime'),
(28, 'Book Libary', 'https://usa1lib.org', 0, 0, 6, 'The world\'s largest ebook library', 'Book, Free, Sale, Ebook, Download, Read'),
(29, 'SteamFree', 'https://steamunlocked.net', 0, 0, 6, 'Download games for free', 'Game, Download, Steam, Free, Unlock, Play, Computer'),
(30, 'Internet Speed', 'https://fast.com', 0, 0, 7, 'Check your internet speed', 'Speed, Internet, Connection, Test, Wlan'),
(31, 'Don\'t Wait On Hold', 'https://gethuman.com', 0, 0, 7, 'Waits on hold so you don\'t have to and calls you back', 'Call, Call center, Hold, Wait, Room, Rep, Customer Service'),
(32, 'iFixit', 'https://www.ifixit.com', 0, 0, 7, 'Repair guides for every thing', 'Help, Fix, Manual, Step by step, DIY'),
(33, 'DownForEveryoneOrJustMe', 'https://downforeveryoneorjustme.com', 0, 0, 7, 'Checks if a website is down for everyone or just you', 'Website, Down, Slow, General, Everyone'),
(34, 'Stolen Camera Finder', 'https://www.stolencamerafinder.com', 0, 0, 7, 'Use the serial number stored in your photos to search the web for other photos taken with the same camera', 'Camera, Find, Stolen, Serial number, Photos'),
(35, 'ManualsLib', 'https://www.manualslib.com', 0, 0, 7, 'Find many user manuals here', 'Maschine, Help, Manual, Book, Libary, Fix, Repair'),
(36, 'CV', 'https://flowcv.com', 0, 0, 8, 'Build a job-winning resume for free', 'Job, Curriculum Vitae, Bulit, Templates, Quick'),
(37, 'Deepl', 'https://www.deepl.com/translator', 0, 0, 8, 'The most accurate and reliable translation site', 'Translator, translate, language, exact'),
(38, 'Essay Typer', 'http://www.essaytyper.com', 0, 0, 8, 'Finish your essay - very fast', 'School, Homework, Subject, Topic'),
(39, 'Print Friendly', 'https://www.printfriendly.com', 0, 0, 8, 'Make any web page print friendly & PDF', 'Print, PDF, Website, Shorten, Highlights'),
(40, 'CopyChar', 'https://copychar.cc', 0, 0, 8, 'Copy special characters and emojis that aren’t on your keyboard', 'Symbols, Emojis, Get, Paste'),
(41, 'FilePizza', 'https://file.pizza', 0, 0, 8, 'Transfer data without login', 'Files, Send, Data'),
(42, 'Ocean Search', 'https://www.ocearch.org/tracker/', 0, 0, 9, 'Track marine species around the globe', 'Sea, Animals, Follow, Tracker, Global, Earth'),
(43, 'Marine Tracker', 'https://www.marinetraffic.com', 0, 0, 9, 'Track ships all around the globe', 'Ship, Vessel, Follow, Sea, Tracker, Earth'),
(44, 'Satellite Tracker', 'https://platform.leolabs.space/visualization', 0, 0, 9, 'Track Satellites around the earth', 'Orbit, Low, Earth, Atmosphere, Space, Spacex'),
(45, 'Icon Finder', 'https://www.iconfinder.com', 0, 0, 10, 'Search and download all kinds of icons', 'Clipart, Symbols'),
(46, 'Pexels', 'https://www.pexels.com', 0, 0, 10, 'Free stock photos and videos', 'Royalty, Free, Stock, Download, Use, Pictures'),
(47, 'Photopea', 'https://www.photopea.com', 0, 0, 10, 'Just like Photoshop but for free', 'Photoshop, Edit, Crop, Effects, Pictures, Editing, Filter'),
(48, 'Photo Eraser', 'https://www.magiceraser.io', 0, 0, 10, 'Remove unwanted objects from images', 'Pictures, Editing'),
(49, 'Image Upscaler', 'https://clipdrop.co/image-upscaler', 0, 0, 10, NULL, 'Pictures, Editing, Size, Pixel'),
(50, 'Background Remover', 'https://clipdrop.co/remove-background', 0, 0, 10, NULL, 'Pictures, Editing, Clear'),
(51, 'Photo Compressor', 'https://squoosh.app', 0, 0, 10, NULL, 'Pictures, Editing, Small, Size, Pixel'),
(52, 'Video Motion', 'https://jitter.video', 0, 0, 10, 'Animate your designs easily', 'Edit, Motion, Animation, Cut,'),
(53, 'Unblocked Games', 'https://sites.google.com/site/tyroneunblockedgame/home', 0, 0, 11, 'Play games in school without getting blocked', 'Game, Download, Steam, Free, Unlock, Play, Computer'),
(54, 'Nintendo Games', 'https://emulatorgames.online', 0, 0, 11, 'Play retro games online', 'Game, Download, Steam, Free, Unlock, Play, Computer, Mario, Wii'),
(55, 'Minecraft', 'https://classic.minecraft.net/', 0, 0, 11, 'Play Minecraft online', 'Game, Download, Steam, Free, Unlock, Play, Computer'),
(56, 'RiderHD', 'https://www.freeriderhd.com', 0, 0, 11, 'Fun bike game to play', 'Game, Download, Steam, Free, Unlock, Play, Computer'),
(57, 'Fonts', 'https://fonts.google.com', 0, 0, 12, 'Free fonts to use', 'Google, Write, Design, Download'),
(58, 'I Love PDF', 'https://www.ilovepdf.com', 0, 0, 12, 'Every tool you need to work with PDFs', 'Files, Merge, Split, Compress, Word, Power Point, Excel, Edit, Sign, JPG, PDF, Rotate, Page, Scan'),
(59, 'File Converter', 'https://cloudconvert.com', 0, 0, 12, 'Convert files from one format to another', 'File, Converter, JPEG, PDF, aif, cda, mid,mp3,mp4,mpa, ogg, wav,wma, wpl, zip, rar, bin, dmg, iso, toast, vcd, dat, log, xml,exe, jar, msi, ai, bmp, gif, ico, jpg, png, ps, psd, svg'),
(60, 'Route Planner', 'https://abetterrouteplanner.com', 0, 0, 13, 'Work out the optimal route for a trip with an electric car', 'Ev, charging, battery, car, planning, fast'),
(61, 'Road Trip', 'https://roadtrippers.com', 0, 0, 13, 'Discover amazing stops along your route', 'Discover, road, street, attraction, sightseeing, famous, holiday, car, scenic, hidden,'),
(62, 'Grepper', 'https://chrome.google.com/webstore/detail/grepper/amaaokahonnfjjemodnpmeenfpnnbkco', 0, 0, 14, 'Query and Answer System for Programmers', 'Programming, Python, Java, C#'),
(63, 'CSS Scan', 'https://getcssscan.com/css-box-shadow-examples', 0, 0, 14, 'Beautiful CSS Shadows to copy from', NULL),
(64, 'Glassmorphism', 'https://css.glass/', 0, 0, 14, 'Edit your own CSS Glasspane as you like for new Uis', 'CSS, Programming, HTML'),
(65, 'Who is', 'https://who.is/', 0, 0, 9, 'If you like to know the contact address, email and phone number of the website owner, this free whois lookup service will help', NULL),
(66, 'Have I been pwned?', 'https://haveibeenpwned.com/', 0, 0, 9, 'Enter your email or phone to see if your data has been leaked through a databreach', NULL),
(67, 'Euler Project', 'https://projecteuler.net/', 0, 0, 14, 'Try programming these questions and improve your skills', NULL),
(68, 'Detect Mobile Browser', 'http://detectmobilebrowsers.com/', 0, 0, 14, 'Copy code to detect if your client uses a phone to access your website', NULL),
(69, 'Tinkercad', 'https://www.tinkercad.com/', 0, 0, 15, 'Make 3D-Objects very easy and 3D-print them', NULL),
(70, 'Flightradar24', 'https://www.flightradar24.com/50.11,8.66/6', 0, 0, 9, 'Track almost any plane in airspace', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`PKCategories`);

--
-- Indizes für die Tabelle `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`PKLinks`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `links`
--
ALTER TABLE `links`
  MODIFY `PKLinks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
