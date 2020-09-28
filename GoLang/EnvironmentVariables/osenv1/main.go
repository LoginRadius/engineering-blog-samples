package main

import (
	"fmt"
	"os"
)

func main() {
	// Set Environment Variables
	os.Setenv("SITE_TITLE", "Test Site")
	os.Setenv("DB_HOST", "localhost")
	os.Setenv("DB_PORT", "27017")
	os.Setenv("DB_USERNAME", "admin")
	os.Setenv("DB_PASSWORD", "password")
	os.Setenv("DB_NAME", "testdb")

	// Get the value of an Environment Variable
	host := os.Getenv("SITE_TITLE")
	port := os.Getenv("DB_HOST")
	fmt.Printf("Site Title: %s, Host: %s\n", host, port)

	// Unset an Environment Variable
	os.Unsetenv("SITE_TITLE")
	fmt.Printf("After unset, Site Title: %s\n", os.Getenv("SITE_TITLE"))

	/*
	   Checking that an environment variable is present or not.
	*/
	redisHost, ok := os.LookupEnv("REDIS_HOST")
	if !ok {
		fmt.Println("REDIS_HOST is not present")
	} else {
		fmt.Printf("Redis Host: %s\n", redisHost)
	}

	// Expand a string containing environment variables in the form of $var or ${var}
	dbURL := os.ExpandEnv("mongodb://${DB_USERNAME}:${DB_PASSWORD}@$DB_HOST:$DB_PORT/$DB_NAME")
	fmt.Println("DB URL: ", dbURL)
}
