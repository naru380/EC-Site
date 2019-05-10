{$username}様
この度は通販サイトにご利用ありがとうございます。
商品の到着までしばらくお待ちください。

---購入商品---
{foreach from=$items item=item}
{$item.name}: ¥{$item.price|number_format} × {$item.num}点 = ¥{$item.price*$item.num|number_format}
{/foreach}

合計:¥{$check|number_format}
配達先:{$address}
