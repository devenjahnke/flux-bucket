module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:@typescript-eslint/recommended",
        "plugin:vue/vue3-recommended",
        "prettier",
    ],
    "ignorePatterns": [
        "*.d.ts",
        "**/*.css"
    ],
    "overrides": [
    ],
    "parser": "vue-eslint-parser",
    "parserOptions": {
        "parser": "@typescript-eslint/parser",
        "ecmaVersion": "latest",
        "sourceType": "module"
    },
    "plugins": [
        "vue",
        "@typescript-eslint",
    ],
    "rules": {
        "vue/component-tags-order": [
            "error",
            {
                order: ["script", "template", "style"],
            },
        ],
        "vue/multi-word-component-names": "off",
        "vue/comment-directive": 'off',
        "vue/component-api-style": ["error", ["script-setup", "composition"]],
        "vue/component-name-in-template-casing": "error",
        "vue/block-lang": [
            "error",
            {
                script: { lang: "ts" },
            },
        ],
        "vue/define-macros-order": [
            "warn",
            {
                order: ["defineProps", "defineEmits"],
            },
        ],
        "vue/define-emits-declaration": ["error", "type-based"],
        "vue/define-props-declaration": ["error", "type-based"],
        "vue/match-component-import-name": "error",
        "vue/no-ref-object-destructure": "error",
        "vue/no-unused-refs": "error",
        "vue/no-useless-v-bind": "error",
        "vue/padding-line-between-tags": "warn",
        "vue/prefer-separate-static-class": "error",
        "vue/prefer-true-attribute-shorthand": "error",
        "vue/no-v-html": "off",
        "no-undef": "off",
        "no-unused-vars": "off",
        "no-console": ["warn"],
    }
}
