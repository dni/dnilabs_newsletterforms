## depreceated with typo3 8.7 > databasefinisher



### tx_form configuration
```
enctype = multipart/form-data
method = post
prefix = tx_form
confirmation = 1
postProcessor {
  1 = mail
  1 {
    recipientEmail =
    senderEmail =
    subject = Newsletter Anmeldung
  }
  2 = Dnilabs\DnilabsNewsletterforms\Classes\PostProcess\SubscribePostProcessor
  2 {
    # pid with tt_address records
    pid = 117
  }
  #2 = Dnilabs\DnilabsNewsletterforms\Classes\PostProcess\UnsubscribePostProcessor
  #2 {
    # pid with tt_address records
    #  pid = 117
    #}
}
10 = SELECT
10 {
  name = anrede
  label {
    value = Anrede
  }
  10 = OPTION
  10 {
    text = Herr
    value = Herr
  }
  20 = OPTION
  20 {
    text = Frau
    value = Frau
  }
}
20 = TEXTLINE
20 {
  type = text
  name = name
  label {
    value = Name
  }
}

30 = TEXTLINE
30 {
  type = text
  name = email
  label {
    value = Email
  }
}
40 = SUBMIT
40 {
  type = submit
  name = submit
  value = Absenden
}
rules {
  1 = required
  1 {
  breakOnError = 0
  showMessage = 1
  message = *
  error = Des Feld ist ein Pflichtfeld!
  element = name
  }
  2 = required
  2 {
  breakOnError = 0
  showMessage = 1
  message = *
  error = Des Feld ist ein Pflichtfeld!
  element = email
  }
  3 = email
  3 {
  breakOnError = 0
  showMessage = 1
  message = (max@mustermann.com)
  error = Keine korrekte Emailadresse
  element = email
  }
}
```
