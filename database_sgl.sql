-- DROP TABLE "rating";
-- DROP TABLE "post_categories";
-- DROP TABLE "roles";
-- DROP TABLE "bookmarks";
-- DROP TABLE "users_details";
-- DROP TABLE "categories"
-- DROP TABLE "users";
-- DROP TABLE "posts";


CREATE TABLE "users" (
	"id_user" varchar(30) NOT NULL,
	"id_role" int NOT NULL DEFAULT 1,
	"email" varchar(100) NOT NULL,
	"password" varchar(100) NOT NULL,
	"username" varchar(50) NOT NULL,
	PRIMARY KEY("id_user")
);

CREATE TABLE "users_details" (
	"id_users_details" varchar(30) NOT NULL,
	"id_user" varchar(30) NOT NULL,
	"first_name" varchar(30),
	"last_name" varchar(50),
	"city" varchar(50),
	"street_name" varchar(50),
	"street_address" varchar(20),
	"postal_code" varchar(20),
	"state" varchar(50),
	"country" varchar(50),
	PRIMARY KEY("id_users_details")
);

CREATE TABLE "posts" (
	"id_post" varchar(30) NOT NULL,
	"id_user_owner" varchar(30) NOT NULL,
	"title" varchar(255) NOT NULL,
	"description" text NOT NULL,
	"ingredients" text NOT NULL,
	"recipe" text NOT NULL,
	"image" varchar(255) NOT NULL,
	"prep_time" varchar(10) NOT NULL,
	"difficulty" varchar(10) NOT NULL,
	"number_of_servings" int NOT NULL,
	"created_at" varchar(20) NOT NULL,
	"total_score" int NOT NULL DEFAULT 0,
	"total_reviews" int NOT NULL DEFAULT 0,

	PRIMARY KEY("id_post")
);


CREATE TABLE "rating" (
	"id_user" varchar(30) NOT NULL,
	"id_post" varchar(30) NOT NULL,
	"score" int NOT NULL CHECK(score BETWEEN 1 AND 5)
);

CREATE TABLE "bookmarks" (
	"id_user" varchar(30) NOT NULL,
	"id_post" varchar(30) NOT NULL
);

CREATE TABLE "categories" (
	"id_category" serial NOT NULL,
	"category_name" varchar(255),
	"category_desc" varchar(255),
	PRIMARY KEY("id_category")
);

CREATE TABLE "post_categories" (
	"id_post" varchar(30) NOT NULL,
	"id_category" int NOT NULL
);

CREATE TABLE "roles" (
	"id_role" int NOT NULL,
	"role_desc" varchar(20) NOT NULL,
	PRIMARY KEY("id_role")
);

ALTER TABLE "users"
ADD FOREIGN KEY("id_role") REFERENCES "roles"("id_role")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "bookmarks"
ADD FOREIGN KEY("id_user") REFERENCES "users"("id_user")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "bookmarks"
ADD FOREIGN KEY("id_post") REFERENCES "posts"("id_post")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "rating"
ADD FOREIGN KEY("id_user") REFERENCES "users"("id_user")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "rating"
ADD FOREIGN KEY("id_post") REFERENCES "posts"("id_post")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "post_categories"
ADD FOREIGN KEY("id_post") REFERENCES "posts"("id_post")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "post_categories"
ADD FOREIGN KEY("id_category") REFERENCES "categories"("id_category")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "posts"
ADD FOREIGN KEY("id_user_owner") REFERENCES "users"("id_user")
ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE "users_details"
ADD FOREIGN KEY("id_user") REFERENCES "users"("id_user")
ON UPDATE CASCADE ON DELETE CASCADE;