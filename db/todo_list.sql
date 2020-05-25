-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-05-25 10:32:34
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `file`
--

-- --------------------------------------------------------

--
-- 資料表結構 `todo_list`
--

CREATE TABLE `todo_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` date NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `todo_list`
--

INSERT INTO `todo_list` (`id`, `subject`, `description`, `create_date`, `due_date`) VALUES
(1, '買早餐', '今天早餐想吃麥當勞', '2020-05-24', '2020-05-24'),
(2, '練程式', '練習迴圈的用法', '2020-05-24', '2020-05-24'),
(3, '健身', '去運動中心跑步一小時', '2020-05-24', '2020-05-25'),
(4, '買午餐', '今天吃便當', '2020-05-25', '2020-05-25'),
(5, '上課', '有點難的檔案處理', '2020-05-25', '2020-05-25'),
(6, '逛街', '新莊夜市散心', '2020-05-25', '2020-05-26');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
