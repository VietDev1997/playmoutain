<?php

namespace App\Http\Controllers;

use App\Color;
use App\Instock;
use App\Maker;
use App\MoveStock;
use App\Product;
use App\Shop;
use App\Size;
use App\Stock;
use App\StockHistory;
use App\Suppliers;
use App\Tax;
use Config;
use Illuminate\Http\Request;

class GoodsManagerController extends Controller {
	public function index(Request $request) {
		$items = $request->items;
		$keyProduct = $request->keyProduct;
		$productName = $request->productName;
		$suppliers = $request->suppliers;
		$maker = $request->maker;
		$shop_id = $request->shop_id;
		$list = Product::getGoodsManager();
		$shop = Shop::select('shop_name', 'id')->get();
		$sp = Shop::where('status', 1)->get();
		$spl = Suppliers::where('status', 1)->get();
		if (isset($keyProduct) && !empty($keyProduct)) {
			$list = $list->where('product_code', 'like', '%' . $keyProduct . '%');
		}
		if (isset($request->maker) && !empty($request->maker)) {
			$list = $list->where('maker_id', $request->maker);
		}
		if (isset($productName) && !empty($productName)) {
			$list = $list->where('product_name', 'like', '%' . $productName . '%');
		}
		if (isset($request->suppliers) && !empty($request->suppliers)) {
			$list = $list->where('supplier_id', $request->suppliers);
		}
		if (isset($request->shop_id) && !empty($request->shop_id)) {
			$list = $list->where('shop_id', $request->shop_id);
		}
		$list = $list->paginate(is_null($items) ? 30 : $items);
		return view('admin.item-manager.goods-manager.list', ['list' => $list, 'items' => $items, 'keyProduct' => $keyProduct, 'productName' => $productName, 'suppliers' => $suppliers, 'maker' => $maker, 'shop_id' => $shop_id, 'shop' => $shop, 'sp' => $sp, 'spl' => $spl]);
	}

	public function importCsv(Request $request) {
		$shop = $request->get('shop');
		$supplier = $request->get('supplier');
		$file = $request->file('file');
		if (file_exists($file) && $file->getClientOriginalExtension() === 'csv') {
			$customerArr = file_get_contents($file);
			$arr_csv = array_map('str_getcsv', explode("\n", $customerArr));
			$result = [];
			$fields = ['product_code', 'maker_name', 'product_name', 'color_name', 'size_name', 'notes', 'member_price', 'notax_price', 'tax_price', 'stock_price', 'in_number', 'shop_id', 'supplier_id'];
			foreach ($arr_csv as $data) {
				if (count($data) == 12) {
					array_splice($data, 1, 1);
					array_push($data, $shop, $supplier);
					$data = array_combine($fields, $data);
					array_push($result, $data);
				} else {
					unset($data);
				}
			}
			foreach ($result as $value) {
				$product_code = $value['product_code'];
				$shop_id = $value['shop_id'];
				$color_name = $value['color_name'];
				$size_name = $value['size_name'];
				$maker_name = $value['maker_name'];
				$product_id = Product::getId($product_code, $shop_id);
				$stock_id = Stock::setId($product_id);
				$color_id = Color::getId($color_name);
				$size_id = Size::getId($size_name);
				$maker_id = Maker::getId($maker_name);
				if ($product_id) {
					Instock::insert($value, $product_id);
					if ($stock_id) {
						Stock::updateStock_import($value, $stock_id, $product_id);
					} else {
						Stock::inserts($value, $product_id);
					}
				} else {
					if ($color_id == false && $size_id == false) {
						Color::createColor(array('color_name' => $color_name));
						Size::createSize(array('size_name' => $size_name));
						$color_id = Color::getId($color_name);
						$size_id = Size::getId($size_name);
					}
					Product::insert(array_merge($value, array('size_id' => $size_id, 'color_id' => $color_id, 'maker_id' => $maker_id)));
				}
			}
			return redirect()->route('goods-manage')->with('successs', 'import csv successfully');
		}
		return redirect()->route('goods-manage')->with('errorss', 'You need to import a .csv file');
	}

	public function create() {
		$store = Shop::where('status', 1)->get();
		$size = Size::where('status', 1)->get();
		$color = Color::where('status', 1)->get();
		$supplier = Suppliers::where('status', 1)->get();
		$maker = Maker::where('status', 1)->get();
		$config = Tax::all();
		foreach ($config as $value) {
			if ($value->name == 'tax') {
				$tax = $value->value;
			}

			if ($value->name == 'member_tax') {
				$membertax = $value->value;
			}

		}
		return view('admin.item-manager.goods-manager.create', ['store' => $store, 'size' => $size, 'color' => $color, 'supplier' => $supplier, 'maker' => $maker, 'tax' => $tax, 'membertax' => $membertax]);
	}

	public function edit($id) {
		$product = Product::find($id);
		$store = Shop::where('status', 1)->get();
		$size = Size::where('status', 1)->get();
		$color = Color::where('status', 1)->get();
		$supplier = Suppliers::where('status', 1)->get();
		$maker = Maker::where('status', 1)->get();
		$config = Tax::all();
		foreach ($config as $value) {
			if ($value->name == 'tax') {
				$tax = $value->value;
			}

			if ($value->name == 'member_tax') {
				$membertax = $value->value;
			}

		}
		return view('admin.item-manager.goods-manager.copy', ['product' => $product, 'store' => $store, 'size' => $size, 'color' => $color, 'supplier' => $supplier, 'maker' => $maker, 'tax' => $tax, 'membertax' => $membertax]);
	}

	public function editProduct($id) {
		$product = Product::find($id);
		$store = Shop::where('status', 1)->get();
		$size = Size::where('status', 1)->get();
		$color = Color::where('status', 1)->get();
		$supplier = Suppliers::where('status', 1)->get();
		$maker = Maker::where('status', 1)->get();
		$config = Tax::all();
		foreach ($config as $value) {
			if ($value->name == 'tax') {
				$tax = $value->value;
			}

			if ($value->name == 'member_tax') {
				$membertax = $value->value;
			}

		}
		return view('admin.item-manager.goods-manager.update', ['product' => $product, 'store' => $store, 'size' => $size, 'color' => $color, 'supplier' => $supplier, 'maker' => $maker, 'tax' => $tax, 'membertax' => $membertax]);
	}

	public function detail($id) {
		$product = Product::find($id);
		return view('admin.item-manager.goods-manager.details', ['product' => $product]);
	}

	public function storeProduct(Request $request) {
		$this->validate($request, [
			'shop_id' => 'required',
			'member_price' => 'required',
			'maker_id' => 'required',
			'supplier_id' => 'required',
			'stock_price' => 'numeric|digits_between:0,10',
			'notax_price' => 'digits_between:1,10',
			'product_code' => 'max:255',
			'product_name' => 'max:255',
			'notes' => 'max:255',
		],
			[
				'shop_id.required' => 'Shop' . config('constant.err.required'),
				'maker_id.required' => 'Manufacturer' . config('constant.err.required'),
				'supplier_id.required' => 'Supplier' . config('constant.err.required'),
				'member_price.required' => 'Member Price' . config('constant.err.required'),
				'stock_price.numeric' => 'Purchase Price' . config('constant.err.numeric'),
				'stock_price.digits_between' => 'Purchase Price' . config('constant.err.maxMin'),
				'notax_price.digits_between' => 'Prices do not include taxes' . config('constant.err.maxMin'),
				'product_code.max' => 'Product code' . config('constant.err.longContain'),
				'product_name.max' => 'Product name' . config('constant.err.longContain'),
				'notes.max' => 'Note' . config('constant.err.longContain'),
			]
		);
		$data = $request->only(['shop_id', 'product_code', 'product_name', 'tax_price', 'member_price', 'size_id', 'color_id', 'maker_id', 'supplier_id', 'notax_price', 'stock_price', 'notes']);
		$res = Product::createProduct($data);
		if ($res) {
			return redirect()->back()->with('success', 'Product created successfully');
		}
		return redirect()->back()->with('error', 'Product error');
	}

	public function updateProducts(Request $request, $id) {
		$this->validate($request, [
			'shop_id' => 'required',
			'member_price' => 'required',
			'maker_id' => 'required',
			'supplier_id' => 'required',
			'stock_price' => 'numeric|digits_between:0,10',
			'notax_price' => 'digits_between:1,10',
			'product_code' => 'max:255',
			'product_name' => 'max:255',
			'notes' => 'max:255',
		],
			[
				'shop_id.required' => 'Shop' . config('constant.err.required'),
				'maker_id.required' => 'Manufacturer' . config('constant.err.required'),
				'supplier_id.required' => 'Supplier' . config('constant.err.required'),
				'member_price.required' => 'Member Price' . config('constant.err.required'),
				'stock_price.numeric' => 'Purchase Price' . config('constant.err.numeric'),
				'stock_price.digits_between' => 'Purchase Price' . config('constant.err.maxMin'),
				'notax_price.digits_between' => 'Prices do not include taxes' . config('constant.err.maxMin'),
				'product_code.max' => 'Product code' . config('constant.err.longContain'),
				'product_name.max' => 'Product name' . config('constant.err.longContain'),
				'notes.max' => 'Note' . config('constant.err.longContain'),
			]
		);
		$data = $request->only(['shop_id', 'product_code', 'product_name', 'tax_price', 'member_price', 'size_id', 'color_id', 'maker_id', 'supplier_id', 'notax_price', 'stock_price', 'notes']);
		$res = Product::updateProduct($data, $id);
		if ($res) {
			return redirect()->route('goods-manage')->with('success', 'Product updated successfully');
		}
		return redirect()->back()->with('error', 'Product error');
	}

	public function update($stock_count, $product_id, $preset, $stockid, $shopid) {
		$result = Stock::updateStock($stock_count, $product_id);
		StockHistory::inStockHistory($product_id, $shopid, $stock_count, $stockid, $preset);
		return response()->json($result);
	}

	public function store($product_id, $shop_id, $number, $id) {
		$result = Instock::inStock($product_id, $shop_id, $number);
		$oldnumber = Stock::stockNumberOld($id);
		$newnumber = $number + $oldnumber;
		Stock::updateStock($newnumber, $product_id);
		return response()->json($result);
	}

	public static function move($product_id, $shop_id, $number, $id, $shop, $from_number) {
		$productCode = Product::productCode($shop_id); // lay product code de kiem tra xem shop dc nhan da ton tai
		if ($productCode != null) {
			//kiem tra neu product_code null thi shop chua ton tai thi tao moi nguoc lai update
			$toStockNumber = Stock::stockNumber($shop_id);
			if ($toStockNumber == null) {
				$toStockNumber = $number;
			}
			$idStock = Stock::idStock($product_id, $shop_id);
			$result = MoveStock::moveStock($product_id, $id, $shop, $shop_id, $from_number, $toStockNumber, $number); //luu lich su chuyen product vao bang move_stock_history
			$oldNumber = Stock::stockNumberOld($id);
			$newnumber = $oldNumber - $number;
			Stock::updateStock($newnumber, $product_id); //set lai gia tri cho shop gui
			$newNumber = Stock::stockNumberOld($idStock);
			$new = $newNumber + $number;
			Stock::updateStock($new, $idStock); //set lai gia tri cho shop gui
			Instock::inStock($product_id, $shop_id, $number); //save lich su nhan product
			return response()->json($result);
		}
		$product = Product::where('id', $product_id)->first(); // tao moi lai shop trong bang product vs cac gia tri cua shop chuyen va shop_id cua shop nhan
		$model = $product->replicate();
		$model->shop_id = $shop_id;
		$model->save();
		Instock::inStock($product_id, $shop_id, $number); //save lich su nhan product
		$oldNumber = Stock::stockNumberOld($id);
		$newnumber = $oldNumber - $number;
		Stock::updateStock($newnumber, $product_id); //set lai gia tri cho shop gui
		Stock::autoAdd($shop_id, $product_id, $number); //them shop ms vao bang stock
		$toStockNumber = Stock::stockNumber($shop_id);
		if ($toStockNumber == null) {
			$toStockNumber = $number;
		}
		$result = MoveStock::moveStock($product_id, $id, $shop, $shop_id, $from_number, $toStockNumber, $number); //luu lich su chuyen product vao bang move_stock_history
		return response()->json($result);
	}

	public function getHistory($shop_id, $product_id) {
		$history = StockHistory::getHistory($shop_id, $product_id);
		return response()->json($history);
	}

}