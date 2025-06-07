import { FlatCompat } from '@eslint/eslintrc'
import vueParser from 'vue-eslint-parser'
import tsParser from '@typescript-eslint/parser'

const compat = new FlatCompat('eslint:recommended')

export default [
  ...compat.extends(
    'plugin:vue/vue3-recommended',
    'plugin:@typescript-eslint/recommended',
    'plugin:nuxt/recommended',
    'prettier'
  ),
  {
    languageOptions: {
        globals: {
            
        },
      parser: vueParser,
      parserOptions: {
        parser: tsParser,
        ecmaVersion: 2021,
        sourceType: 'module',
      },
    },
  },
]
