-- Insert sample data into the Subscriber table
INSERT INTO Subscriber (subs_name) VALUES
('The Café'),
('My Restaurant');

-- Insert sample data into the Box table
INSERT INTO Box (box_name, prayerzone, subs_id) VALUES
('Orchard Tower', 'WLY01', 1),
('United Square', 'SWK02', 1),
('Thompson Plaza', 'JHR01', 2),
('Peranakan Place', 'KDH01', 2),
('Marina Boulevard', 'MLK01', 2);

-- Insert sample data into the Song table
INSERT INTO Song (song_title, subs_id, box_id, prayerzone, prayertimedate, prayertimeseq, prayertime) VALUES
('Subuh (03-09)', 1, 101, 'WLY01', '2024-03-09', 1, '06:14'),
('Zohor (03-09)', 1, 101, 'WLY01', '2024-03-09', 2, '13:26'),
('Subuh (03-09)', 2, 102, 'SWK02', '2024-03-09', 1, '06:15'),
('Zohor (03-09)', 2, 102, 'SWK02', '2024-03-09', 2, '13:27');