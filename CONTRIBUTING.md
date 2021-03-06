# Contributing Guidelines
Thank you for considering a contribution to Rubix ML. We strongly believe that our contributors play the most important role in bringing powerful machine learning tools to the PHP language. Please read over the following guidelines so that we can continue to provide high quality machine learning tools that our users love.

### Pull Request Checklist
Here are a few things to check off before sending in a pull request ...

- Your changes pass [static analysis](#static-analysis)
- All [unit tests](#unit-testing) pass
- Your changes are consistent with our [coding style](#coding-style)
- Do your changes require updates to the documentation?
- Does an entry to the CHANGELOG need to be added?

> New to pull requests? Github has a great [howto](https://help.github.com/articles/about-pull-requests/) to get you started.

## Static Analysis
Static code analysis is an integral part of our overall testing and quality assurance strategy. Static analysis allows us to catch bugs before they make it into the codebase. Therefore, it is important that your updates pass static analysis at the level set by the project lead.

To run static analysis:
```sh
$ composer analyze
```
  
## Unit Testing
New code will usually require an accompanying unit test. What to test depends on the type of change you are making. See the individual unit testing guidelines below.

To run the unit tests:
```sh
$ composer test
```

### General Object Testing
Limiting tests to public methods is usually sufficient. It is important to test for edge cases such as mistakes that the user might make to ensure they are handled properly.

### Bugfix Testing
Bugs usually indicate an area of the code that has not been properly tested yet. When submitting a bug fix, please include a passing test that would have reproduced the bug prior to your changes.

### Learner Testing
We use a unique end-to-end testing schema for all learners that involves generating a controlled training and testing set, training the learner, and then validating its predictions using an industry-standard scoring metric. The reason for this type of test is to be able to confirm that the learner offers the ability to generalize its training to new data. Since not all learners are the same, choose a dataset and minimum validation score that is appropriate for a real world use case.

> **Note:** Be sure to seed the random number generator with a known constant in your tests to make them deterministic.

## Coding Style
Rubix ML follows the PSR-2 coding style with additional rules to keep the codebase tidy and reduce cognitive load for our developers.

To run the style checker:
```sh
$ composer check
```

To run the style fixer:
```sh
$ composer fix
```

### Naming
Use accurate, descriptive, and concise nomenclature. A variable name should only describe the data that the variable contains. With few exceptions, interfaces and the classes that implement them should be named after what the object *does* whereas value objects and classes that extend a base class should be named after what the object *is*. Method and function names should be verbs unless in the case of an accessor/getter function, in which case, the 'get' prefix may be dropped. Prioritize full names over abbreviations unless in the case where the abbreviation is the more common usage.

### Mutability
Objects implemented in Rubix ML have a mutability policy of *generally* immutable which means properties are private or protected and state must be mutated only through a well-defined public API.

### Comments
Please provide a docblock for every class, property, method, constant, and function that includes a brief description of what the thing does. Inline comments are not permissable - instead use expressive syntax and abstractions to articulate your intent in code.

### Anonymous Classes and Functions
Due to a limitation in PHP that requires objects and functions to be named in order to be unserialized and since the library relies on serialization for persistence, we do not use anonymous classes or functions in our codebase. Instead, create a named class or function.

## Benchmarks
Performance can be critical for some machine learning projects. To ensure that our users have the best experience, we benchmark every learner and use the information as a baseline to make optimizations. When contributing a new learner to Rubix ML, please include a benchmark.

To run the benchmarking suite:
```sh
$ composer benchmark
```

## Code Review
We use pull requests as an opportunity to communicate with our contributors. Oftentimes, we can improve code readability, find bugs, and make optimizations during the code review process. Every pull request must have the approval from at least one core engineer before merging into the main codebase.

## Anti Plagiarism Policy
Our community takes a strong stance against plagiarism, or the copying of another author's code without attribution. Since the spirit of open source is to make code freely available, it is up to the community to enforce policies that deter plagiarism. As such, we do not allow contributions from those who violate this policy.
