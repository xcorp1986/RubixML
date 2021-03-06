<span style="float:right;"><a href="https://github.com/RubixML/RubixML/blob/master/src/Regressors/Ridge.php">[source]</a></span>

# Ridge
L2 regularized Least Squares linear model solved using a closed-form solution. The addition of regularization, controlled by the *alpha* parameter, makes Ridge less prone to overfitting than ordinary linear regression.

**Interfaces:** [Estimator](../estimator.md), [Learner](../learner.md), [Ranks Features](../ranks-features.md), [Persistable](../persistable.md)

**Data Type Compatibility:** Continuous

## Parameters
| # | Param | Default | Type | Description |
|---|---|---|---|---|
| 1 | alpha | 1.0 | float | The strength of the L2 regularization penalty. |

## Example
```php
use Rubix\ML\Regressors\Ridge;

$estimator = new Ridge(2.0);
```

## Additional Methods
Return the weights of features in the decision function.
```php
public coefficients() : array|null
```

Return the bias added to the decision function.
```php
public bias() : float|null
```
