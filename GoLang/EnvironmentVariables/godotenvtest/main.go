package main

import (
	"fmt"
	"log"
	"os"

	"github.com/joho/godotenv"
)

func main() {

	// load .env file
	err := godotenv.Load(".env")

	if err != nil {
		log.Fatalf("Error loading .env file")
	}

	siteTitle := os.Getenv("SITE_TITLE")
	dbHost := os.Getenv("DB_HOST")

	fmt.Printf("godotenv : %s = %s \n", "Site Title", siteTitle)
	fmt.Printf("godotenv : %s = %s \n", "DB Host", dbHost)
}
