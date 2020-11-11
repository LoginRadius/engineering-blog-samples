package main

import (
	"fmt"
	"os"
	"strings"
)

func main() {

	os.Setenv("NAME", "Puneet")
	os.Setenv("DB_HOST", "localhost")

	// Environ returns a slice of string containing all the environment variables in the form of key=value.
	for _, env := range os.Environ() {
		envPair := strings.SplitN(env, "=", 2)
		key := envPair[0]
		value := envPair[1]

		fmt.Printf("%s : %s\n", key, value)
	}

	// Delete all environment variables
	os.Clearenv()

	fmt.Println("Number of environment variables remaining: ", len(os.Environ()))
}
