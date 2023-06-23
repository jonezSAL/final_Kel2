const nodemailer = require("nodemailer");

const transporter = nodemailer.createTransport({
  service: "gmail",
  auth: {
    user: "joneslumbantoruan9@gmail.com",
    pass: "Tiar_tiur27",
  },
});

const mailOptions = {
  from: "joneslumbantoruan9@gmail.com",
  to: "joneslumbantoruan9@gmail.com",
  subject: "Hello",
  text: "testers",
};

transporter.sendMail(mailOptions, function (error, info) {
  if (error) {
    console.log(error);
  } else {
    console.log("Email berhasil dikirim: " + info.response);
  }
});
