-- Alyssa Jarrell
-- CIS 244 Spring 2021
-- Professor Laurence Liss
-- Week 8: Museum Database Lab

CREATE TABLE museums (
    museum_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    museum_name TEXT NOT NULL,
    country TEXT NOT NULL,
    city TEXT
);

INSERT INTO museums (museum_name, country, city) VALUES

('Louvre'  ,  'France'  ,  'Paris' ),
('State Hermitage Museum'  ,  'Russia'  ,  'St. Petersburg' ),
('National Museum of China'  ,  'China'  ,  'Beijing' ),
('Metropolitan Museum of Art'  ,  'United States'  ,  'New York City' ),
('Vatican Museums'  ,  'Vatican City'  ,  'Vatican City (Rome)' ),
('Tokyo National Museum'  ,  'Japan'  ,  'Tokyo' ),
('National Museum of Anthropology'  ,  'Mexico'  ,  'Mexico City' ),
('Victoria and Albert Museum'  ,  'United Kingdom'  ,  'London' ),
('National Museum of Korea'  ,  'South Korea'  ,  'Seoul' ),
('Art Institute of Chicago'  ,  'United States'  ,  'Chicago' )
;

INSERT INTO museums (museum_name, country) VALUES
('Nanjing Museum'  ,  'China' ),
('British Museum'  ,  'United Kingdom' ),
('National Gallery of Art'  ,  'United States'),
('MASS MoCA'  ,  'United States'),
('Cinquantenaire Museum'  ,  'Belgium'),
('Three Gorges Museum'  ,  'China'),
('Museum of Fine Arts'  ,  'United States'),
('Shandong Art Museum'  ,  'China'),
('Israel Museum'  ,  'Israel'),
('National Gallery Singapore'  ,  'Singapore'),
('Minneapolis Institute of Art'  ,  'United States'),
('Arsenal (Biennale)'  ,  'Italy'),
('Musée National d''Art Moderne'  ,  'France'),
('Musée d''Orsay'  ,  'France'),
('Ōtsuka Museum of Art'  ,  'Japan'),
('San Francisco Museum of Modern Art'  ,  'United States'),
('Museo del Prado'  ,  'Spain'),
('Philadelphia Museum of Art'  ,  'United States'),
('Denver Art Museum'  ,  'United States'),
('Egyptian Museum'  ,  'Egypt'),
('Museo di Capodimonte'  ,  'Italy'),
('Matarazzo Ciccillo (Bienal)'  ,  'Brazil'),
('Dia:Beacon'  ,  'United States'),
('Dallas Museum of Art'  ,  'United States'),
('Museo Reina Sofía'  ,  'Spain'),
('MMCA, Gwacheon'  ,  'South Korea'),
('Detroit Institute of Arts'  ,  'United States'),
('Kunsthistorisches Museum'  ,  'Austria'),
('Tokyo National Art Center'  ,  'Japan'),
('National Taiwan Museum of Fine Arts'  ,  'Taiwan'),
('National Gallery in Prague (Veletržní)'  ,  'Czech Republic'),
('Indianapolis Museum of Art'  ,  'United States'),
('Bavarian National Museum'  ,  'Germany'),
('Brooklyn Museum'  ,  'United States'),
('Capital Museum'  ,  'China'),
('Montreal Museum of Fine Arts'  ,  'Canada'),
('National Gallery'  ,  'United Kingdom'),
('National Gallery of Victoria (St Kilda Road)'  ,  'Australia'),
('Palais de Tokyo'  ,  'France'),
('Salar Jung Museum'  ,  'India'),
('Virginia Museum of Fine Arts'  ,  'United States'),
('Tate Modern'  ,  'United Kingdom'),
('Cleveland Museum of Art'  ,  'United States'),
('National Gallery of Canada'  ,  'Canada'),
('Hamburger Kunsthalle'  ,  'Germany'),
('Museum Boijmans Van Beuningen'  ,  'Netherlands'),
('Houston Museum of Fine Arts'  ,  'United States'),
('National Gallery of Modern Art'  ,  'India'),
('Palais des Beaux-Arts de Lille'  ,  'France'),
('Pinakothek der Moderne'  ,  'Germany'),
('Rijksmuseum'  ,  'Netherlands'),
('Tretyakov Gallery (Krymsky Val)'  ,  'Russia'),
('Milwaukee Art Museum'  ,  'United States'),
('Taipei Fine Arts Museum'  ,  'Taiwan'),
('Museum of Modern Art'  ,  'United States'),
('Art Gallery of Ontario'  ,  'Canada'),
('Art Gallery of New South Wales'  ,  'Australia'),
('Capitoline Museums'  ,  'Italy'),
('Fondazione Prada'  ,  'Italy'),
('Guggenheim Museum'  ,  'Spain'),
('Los Angeles County Museum of Art'  ,  'United States'),
('MAC-University of São Paulo'  ,  'Brazil'),
('Pergamon Museum'  ,  'Germany'),
('Shaanxi History Museum'  ,  'China'),
('HangarBicocca'  ,  'Italy'),
('Museu Nacional d''Art de Catalunya'  ,  'Spain'),
('Tibet Museum'  ,  'China'),
('Portland Art Museum'  ,  'United States'),
('Museum of Fine Arts'  ,  'Hungary'),
('Carnegie Museum of Art'  ,  'United States'),
('Hamburger Bahnhof'  ,  'Germany'),
('Kunstmuseum Basel'  ,  'Switzerland'),
('MAXXI'  ,  'Italy'),
('Museo Egizio'  ,  'Italy'),
('Museum Kunstpalast'  ,  'Germany'),
('MMCA'  ,  'South Korea'),
('National Museum'   ,   'Poland'),
('Russian Museum'  ,  'Russia'),
('Saint Louis Art Museum'  ,  'United States'),
('Museums of Sforza Castle'  ,  'Italy'),
('Tel Aviv Museum of Art'  ,  'Israel'),
('National Palace Museum'  ,  'Taiwan'),
('National Archaeological Museum'  ,  'Spain'),
('Musée Fabre'  ,  'France'),
('Bardo National Museum'  ,  'Tunisia'),
('Cité de l''Architecture et du Patrimoine'  ,  'France'),
('National Museum'  ,  'India'),
('National Gallery'  ,  'Norway'),
('Power Station of Art (Biennale)'  ,  'China'),
('Smithsonian American Art Museum'  ,  'United States'),
('Musée du quai Branly'  ,  'France'),
('Liaoning Provincial Museum'  ,  'China'),
('Gallerie di Piazza Scala'  ,  'Italy'),
('National Art Museum of China'  ,  'China'),
('Galleria degli Uffizi'  ,  'Italy'),
('Galleria Nazionale d''Arte Moderna'  ,  'Italy'),
('Gemäldegalerie'  ,  'Germany'),
('Louvre Abu Dhabi'  ,  'UAE'),
('Museum Ludwig'  ,  'Germany'),
('National Archaeological Museum'  ,  'Greece'),
('Neues Museum'  ,  'Germany'),
('Petit Palais'  ,  'France'),
('Pushkin Museum'  ,  'Russia'),
('Stedelijk Museum'  ,  'Netherlands'),
('Thyssen-Bornemisza Museum'  ,  'Spain'),
('Toledo Museum of Art'  ,  'United States'),
('Tretyakov Gallery'  ,  'Russia'),
('de Young'  ,  'United States'),
('Nelson-Atkins Museum of Art'  ,  'United States');

/*QUERY TO ALTER TABLE -- I manually added data to my table because I damaged the original DB, but here is the query I would use to add city data
ALTER TABLE museums
ADD city TEXT;
*/

--UPDATE MUSEUM INFO TO ADD CITY NAME
UPDATE Museums
SET city = 'Cairo'
WHERE museum_name = 'Egyptian Museum';

UPDATE Museums
SET city = 'Jerusalum'
WHERE museum_name = 'Israel Museum';

UPDATE Museums
SET city = 'San Francisco'
WHERE museum_name = 'de Young';



-- Queries for PHP page edits

/* SELECT museum_name
FROM museums;*/

-- Query to enter into select form field 
/*SELECT DISTINCT country
FROM museums
ORDER BY country ASC;*/

/*INSERT INTO museums(museum_name, country, city)
VALUES ('Phila Museum of Art', 'United States', 'Philadelphia');*/

/*INSERT INTO museums(museum_name, country, city)
                    VALUES ('" . $_POST['museum_name'] . "', 
                    '" .  $_POST['country_name'] . "', 
                    '" .  $_POST['city'] . "')";  */

/*DELETE FROM museums WHERE museum_id = ' . $_POST['museum_id'];*/


/*UPDATE museums
SET museum_name = 'MuseumName',
    country = 'countryName',
    city = 'cityName'
WHERE museum_id = 1;*/

/*SELECT DISTINCT city FROM museums WHERE */

/*SELECT DISTINCT city 
FROM museums 
WHERE city IS NOT NULL
ORDER BY city ASC;*/