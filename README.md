# TeRRIFICA-crowdmapping
This is a repository for the crowdmapping component of the TeRRIFICA project. This web mapping framework can be used to gather spatial data and insight from the public.
**TeRRIFICA** project has received funding from the European Union’s Horizon 2020 research and innovation programme under grant agreement No.824489

## About TeRRIFICA

Starting on January 2019 and with duration of three and a half years, the TeRRIFICA project set up tailored roadmaps and key performance indicators for the implementation of the developed methodologies and climate change adaptation and mitigation activities in regional practice. Customised capacity building for the different stakeholder groups was be offered.

Through workshops and regional and international summer schools, TeRRIFICA aimed to empower local people, with a particular focus on regional authorities and policy makers, and developed adequate solutions together with them. Field trips to local and regional promising activities related to research and regional innovation, and broader stakeholder engagement with feedback loops were organised.

Through its co-creative multi-stakeholder approaches, participants had the opportunity to expand their knowledge around climate change and innovative climate action and to identify opportunities, drivers and barriers of implementation. Activities take into account challenges for the acceptance and feasibility, technological and regulatory constraints in six pilot regions.

Main project website: https://terrifica.eu/
Crowdmapping tool (English version) is available at the following address: http://climatemapping.terrifica.eu/

![image](https://user-images.githubusercontent.com/10100274/171247090-f85bb75e-c27f-431b-9b61-e7130e74506a.png)


## What is included in the repository

This is a simplified version of the crowdmapping tool found at http://climatemapping.terrifica.eu/ It consists only of the mapping tool itself. The result page will be added in the future but this is a much simpler task, requiring only plain Leflet library. 

The main file is **map.php**. 

Framework is based on using WFS-T service that is utilized to put user input into PostGIS database, To streamline this we use excellent Leaflet-WFST library by Flexberry. Template include 10 predefined layer in 5 categories. Every layer has its own modal template for data input with predefinded list for user input as well as place for open answers. Every layer is user editable (user authentication is not provided but PHP Delight library is recomended). This is most probably a more complicated scenario that you will need for your project but you can add or delete layers at will.

You can use it as a template for your own mapping project. its prepared for internalization making use if i18n libraries both server and client side. Both are needed to translate all editing tools.

Be aware that icons are not provided due to copyright. You need to provide them in the  **ikony** folder

![image](https://user-images.githubusercontent.com/10100274/171258273-e2d22c80-ea78-490b-a856-2642a3127ea7.png)


## Software requierements

- **PHP** - to manage database connection and authentication and server side translation using: **php-i18n** https://github.com/Philipp15b/php-i18n
- **Leaflet** https://leafletjs.com/  - to display maps
- **Leflet Draw** plugin: https://leaflet.github.io/Leaflet.draw/docs/leaflet-draw-latest.html - to enable adding points
- **Leaflet-WFST** https://github.com/Flexberry/Leaflet-WFST - to manage transactional WFS (adding drawed points to database)
- **Geoserver**: https://geoserver.org/ - to manage PostGIS database and WFS input and outputs
- **PostGIS** database
- **jQuery.i18n** https://www.npmjs.com/package/@wikimedia/jquery.i18n - for Javascript translation

## How to use this framework

The most straighforward way to use the framework is as follows:
- Create a PostGIS database with point layer for each category of points
- Expose PostGIS layers through Geoserver
- Change the names of the layers in map.php file (currently they are called q1a, q1b, q2a, q2b, etc...)
- Change attribute names
- Change geoserver address (cu

## Adaptability of the framework

Framework can be adapted for different scenarios. It already have  user interface that can be fully translated. One limitation is that it do not allows polygon creation. This need to be implemented separately.



