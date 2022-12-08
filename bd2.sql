
CREATE TABLE `displayers` (
  `id` int(11) NOT NULL,
  `latable` varchar(32) NOT NULL,
  `champ` varchar(64) NOT NULL,
  `modifie_le` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cree_le` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `displayers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `latable` (`latable`);
ALTER TABLE `displayers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
