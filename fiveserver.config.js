module.exports = {
  port: 5501,
  root: ".",
  open: true,
  browser: ["firefox", "chrome"],
  watch: [".", "./src", "./php"],
  ignore: ["./node_modules", "./dist", "**.log"],
  php: "C:/tools/php84/php.exe",
  remoteLogs: "green",
  highlight: true,
};