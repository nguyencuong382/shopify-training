module.exports = {
    "extends": "airbnb",
    "parser": "babel-eslint",
    "plugins": [
        "import",
        "react",
        "jsx-a11y"
    ],
    "rules": {
        "react/jsx-filename-extension": [1, {
            "extensions": [".js", ".jsx"]
        }],
        "no-useless-constructor": 0,
        "react/prop-types": 0,
        "no-console": "off",
        "linebreak-style": 0,
        "indent": [
            "error",
            2
        ],
        "linebreak-style": [
            "error",
            "windows"
        ],
        "quotes": [
            "error",
            "single"
        ],
        "semi": [
            "error",
            "always"
        ],
        "no-console": "off",
        "no-unused-vars": [
            'warn',
            {
                vars: 'all',
                args: 'none',
                ignoreRestSiblings: false
            }
        ],
        "react/destructuring-assignment": [
          "warn"
        ],
        "eqeqeq":  [
          "warn"
        ],
        "react/prefer-stateless-function": "off"
    },
    "settings": {
        "import/resolver": {
            "node": {
                "extensions": [".js", ".jsx", ".json"]
            }
        },
        "import/extensions": [".js", ".jsx"],
        "import/core-modules": [],
        "import/ignore": [
            "node_modules",
            "\\.(coffee|scss|css|less|hbs|svg|json)$",
            "aws-exports.js"
        ],
        "react": {
            "pragma": "React",
            "version": "15.0"
        },
        "propWrapperFunctions": ["forbidExtraProps", "exact", "Object.freeze"]
    },
    "globals": {
        "window": true,
        "browser": true,
        "document": true,
        "localStorage": true
    }
};
