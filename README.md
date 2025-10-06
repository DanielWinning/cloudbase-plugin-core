# CloudBase | Plugin Core

Provides the bridge between the CloudBase Engine and Plugins.

---

## Base Controller

Plugin controllers should always extend `CloudBase\PluginCore\Controller\CloudBaseController`.

Make use of the `renderedLatteResponse` method to render templates from your plugin:

```php
return $this->renderedLatteResponse('index.latte', []);
```

This will render the `index.latte` template from your plugins `views` directory. Feel free to exclude the `.latte` extension,
it isn't required in order to find your template.