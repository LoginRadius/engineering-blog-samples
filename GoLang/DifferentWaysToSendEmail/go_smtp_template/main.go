package main

import (
  "bytes"
  "fmt"
  "net/smtp"
  "text/template"
)

func main() {

  // Sender data.
  from := "from@gmail.com"
  password := "<Email Password>"

  // Receiver email address.
  to := []string{
    "sender@example.com",
  }

  // smtp server configuration.
  smtpHost := "smtp.gmail.com"
  smtpPort := "587"

  // Authentication.
  auth := smtp.PlainAuth("", from, password, smtpHost)

  t, _ := template.ParseFiles("template.html")

  var body bytes.Buffer

  mimeHeaders := "MIME-version: 1.0;\nContent-Type: text/html; charset=\"UTF-8\";\n\n"
  body.Write([]byte(fmt.Sprintf("Subject: This is a test subject \n%s\n\n", mimeHeaders)))

  t.Execute(&body, struct {
    Name    string
    Message string
  }{
    Name:    "Puneet Singh",
    Message: "This is a test message in a HTML template",
  })

  // Sending email.
  err := smtp.SendMail(smtpHost+":"+smtpPort, auth, from, to, body.Bytes())
  if err != nil {
    fmt.Println(err)
    return
  }
  fmt.Println("Email Sent!")
}