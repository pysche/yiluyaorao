<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>出错啦</title>
</head>
<body>
  <h1>出错了</h1>
  <h2><?php echo $this->message ?></h2>

  <?php if (isset($this->exception)): ?>

  <h3>错误情况</h3>
  <p>
      <b>信息:</b> <?php echo $this->exception->getMessage() ?>
  </p>

  <?php if (APPLICATION_ENV!='production') { ?>
  <h3>Stack trace:</h3>
  <pre><?php echo $this->exception->getTraceAsString() ?>
  </pre>

  <h3>Request Parameters:</h3>
  <pre><?php echo var_export($this->request->getParams(), true) ?>
  </pre>
  <?php } ?>
  <?php endif ?>

</body>
</html>
