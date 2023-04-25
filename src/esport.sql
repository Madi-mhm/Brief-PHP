START TRANSACTION;

DROP DATABASE IF EXISTS brief;

CREATE DATABASE IF NOT EXISTS brief;

USE brief;

CREATE TABLE IF NOT EXISTS team (
    id int(10) NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    description varchar(500) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO game (name, station, format) VALUES
('League of Legends', 'PC', 'MOBA'),
('Dota 2', 'PC', 'MOBA'),
('Counter-Strike: Global Offensive', 'PC', 'FPS'),
('Overwatch ', 'Xbox One', 'FPS'),
('Fortnite', 'PlayStation 4', 'Battle Royale'),
('Valorant', 'PC', 'FPS'),
('Hearthstone', 'PC', 'Jeu de cartes à collectionner'),
('Rocket League', 'PC', 'Sport'),
('Rainbow Six Siege', 'PC', 'FPS tactique'),
('Street Fighter V', 'PlayStation 4', 'Combat');

INSERT INTO competition (name, description, city, format, cash_prize) VALUES
('Thunderdome', 'Championnat CS: Global Offensive', 'Las Vegas', 'Battle Royale', 100000),
('Frostbite', 'Coupe de France Dota', 'France', 'FPS', 50000),
('Cyberstorm', 'Championnat League of Legends', 'Québec', 'MOBA', 250000);

INSERT INTO team (name, description) VALUES
('Team Liquid', 'Équipe Dota 2'),
('SK Telecom T1', 'Équipe de League of Legends'),
('Astralis', 'Équipe de Counter-Strike: Global Offensive');

INSERT INTO player (first_name, second_name, city, team_id, game_id) VALUES
('Lee (Faker)', 'Sang-hyeok', 'Séoul',2 , 1),
('Oleksandr (s1mple)', 'Kostyliev', 'Kiev',3 , 1),
('Lee (Jaedong)', 'Jae-dong', 'Ulsan',2 , 3),
('Gabriel (FalleN)', 'Toledo', 'Itararé',3 , 2),
('Marcelo (coldzera)', 'David', 'São Paulo',3 , 3),
('Cho (Miro)', 'Seong-ju', 'Busan',1 , 2),
('Amer (Miracle-)', 'Al-Barkawi', '',1 , 5),
('Peter (ppd)', 'Dager', 'Fort Wayne',1 , 4);

INSERT INTO sponsor (brand, team_id) VALUES
('Red Bull', 1),
('Intel', 1),
('Coca-Cola', 2),
('Logitech G', 3),
('HyperX', 2);

INSERT INTO team_competition (team_id, competition_id) VALUES
(1, 2),
(2, 3),
(3, 1);

COMMIT;
