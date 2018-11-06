#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: MOUET_categories
#------------------------------------------------------------

CREATE TABLE `MOUET_categories`(
        `id`   Int Auto_increment NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT MOUET_categories_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_picturesProfil
#------------------------------------------------------------

CREATE TABLE `MOUET_picturesProfil`(
        `id`   Int Auto_increment NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT MOUET_picturesProfil_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_teachers
#------------------------------------------------------------

CREATE TABLE `MOUET_teachers`(
        `id`                      Int Auto_increment NOT NULL ,
        `lastname`                Varchar (50) NOT NULL ,
        `firstname`               Varchar (50) NOT NULL ,
        `username`                Varchar (50) NOT NULL ,
        `password`                Varchar (50) NOT NULL ,
        `city`                    Varchar (50) NOT NULL ,
        `mail`                    Varchar (100) NOT NULL ,
        `idPicturesProfil` Int
	,CONSTRAINT MOUET_teachers_PK PRIMARY KEY (id)

	,CONSTRAINT MOUET_teachers_MOUET_picturesProfil_FK FOREIGN KEY (idPicturesProfil) REFERENCES MOUET_picturesProfil(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_activities
#------------------------------------------------------------

CREATE TABLE `MOUET_activities`(
        `id`                  Int Auto_increment NOT NULL ,
        `name`                Varchar (100) NOT NULL ,
        `object`              Varchar (255) NOT NULL ,
        `planning`            Text NOT NULL ,
        `progress`            Text NOT NULL ,
        `result`              Text NOT NULL ,
        `idCategories` Int NOT NULL ,
        `idTeachers`   Int NOT NULL
	,CONSTRAINT MOUET_activities_PK PRIMARY KEY (id)

	,CONSTRAINT MOUET_activities_MOUET_categories_FK FOREIGN KEY (idCategories) REFERENCES MOUET_categories(id)
	,CONSTRAINT MOUET_activities_MOUET_teachers0_FK FOREIGN KEY (idTeachers) REFERENCES MOUET_teachers(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_comments
#------------------------------------------------------------

CREATE TABLE `MOUET_comments`(
        `id`                  Int Auto_increment NOT NULL ,
        `date`                Date NOT NULL ,
        `hour`                Time NOT NULL ,
        `comment`             Varchar (50) NOT NULL ,
        `idActivities` Int NOT NULL ,
        `idTeachers`   Int NOT NULL
	,CONSTRAINT MOUET_comments_PK PRIMARY KEY (id)

	,CONSTRAINT MOUET_comments_MOUET_activities_FK FOREIGN KEY (idActivities) REFERENCES MOUET_activities(id)
	,CONSTRAINT MOUET_comments_MOUET_teachers0_FK FOREIGN KEY (idTeachers) REFERENCES MOUET_teachers(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_cycleDegrees
#------------------------------------------------------------

CREATE TABLE `MOUET_cycleDegrees`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT MOUET_cycleDegrees_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_schoolDegrees
#------------------------------------------------------------

CREATE TABLE `MOUET_schoolDegrees`(
        `id`                    Int Auto_increment NOT NULL ,
        `name`                  Varchar (50) NOT NULL ,
        `idCycleDegrees` Int NOT NULL
	,CONSTRAINT MOUET_schoolDegrees_PK PRIMARY KEY (id)

	,CONSTRAINT MOUET_schoolDegrees_MOUET_cycleDegrees_FK FOREIGN KEY (idCycleDegrees) REFERENCES MOUET_cycleDegrees(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_favorites
#------------------------------------------------------------

CREATE TABLE `MOUET_favorites`(
        `id`                  Int Auto_increment NOT NULL ,
        `idActivities` Int NOT NULL ,
        `idTeachers`   Int NOT NULL
	,CONSTRAINT MOUET_favorites_PK PRIMARY KEY (id)

	,CONSTRAINT MOUET_favorites_MOUET_activities_FK FOREIGN KEY (idActivities) REFERENCES MOUET_activities(id)
	,CONSTRAINT MOUET_favorites_MOUET_teachers0_FK FOREIGN KEY (idTeachers) REFERENCES MOUET_teachers(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: MOUET_activityBySchoolDegree
#------------------------------------------------------------

CREATE TABLE `MOUET_activityBySchoolDegree`(
        `id`                     Int Auto_increment NOT NULL ,
        `idActivities`    Int NOT NULL ,
        `idSchoolDegrees` Int NOT NULL
	,CONSTRAINT MOUET_activityBySchoolDegree_PK PRIMARY KEY (id)

	,CONSTRAINT MOUET_activityBySchoolDegree_MOUET_activities_FK FOREIGN KEY (idActivities) REFERENCES MOUET_activities(id)
	,CONSTRAINT MOUET_activityBySchoolDegree_MOUET_schoolDegrees0_FK FOREIGN KEY (idSchoolDegrees) REFERENCES MOUET_schoolDegrees(id)
)ENGINE=InnoDB;
