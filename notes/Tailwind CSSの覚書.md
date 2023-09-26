# Tailwind CSSの覚書

## Tailwindにも色々ある

Laravel/Jetstreamを導入すると、とりあえず以下の3つは導入される。

### Tailwind CSS

基本的な Tailwind CSS は、多くのユーティリティクラスを提供しており、それらを組み合わせて任意のデザインを作成できます。

例えば、text-center, bg-red-500, p-4 などのクラスを使って、テキストの配置、背景色、パディングを簡単に設定できます。

### Tailwind Forms

Tailwind Forms は、フォーム要素（input, select, textarea など）のスタイリングを簡単にするプラグインです。

これを使うと、フォーム要素にも Tailwind のユーティリティクラスを簡単に適用できます。

```html
<input class="form-input w-full" type="text" placeholder="Your name">
```

このように、form-input というクラスを追加するだけで、Tailwind のスタイルが適用されます。

### Tailwind Typography

Tailwind Typography は、リッチテキストやマークダウンのようなコンテンツに適用されるスタイリングを管理します。

このプラグインを使うと、段落、見出し、引用、リストなどが自動的に適切にスタイルされます。

```html
<div class="prose prose-lg">
    <h1>Your title here</h1>
    <p>Some text here...</p>
</div>
```

prose や prose-lg などのクラスを使用して、リッチテキストコンテンツにスタイルを適用できます。

## Tailwind CSS 使用例

### センタリング

水平方向の中央に揃える

```css
mx-auto
```
