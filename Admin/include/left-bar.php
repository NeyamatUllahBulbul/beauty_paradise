<!-- left-bar.php -->
<aside id="sidebar-left" class="sidebar-left">

	<div class="sidebar-header">
		<div class="sidebar-title">
			Navigation
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li class="nav-active">
						<a href="index.php">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li class="nav-parent">
						<a href="javascript:void(0);" class="waves-effect">
							<i class="fa fa-delicious" ></i>
							<span>Categories</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="category-add.php">
									<span class="pull-right label label-success">add</span>
									<i class="fa fa-plus" aria-hidden="true"></i>
									<span>Category</span>
								</a>
							</li>
							<li>
								<a href="category-list.php">
									<span class="pull-right label label-info">list</span>
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<span>Category</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-parent">
						<a href="javascript:void(0);" class="waves-effect">
							<i class="fa fa-cubes" ></i>
							<span>Products</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="product-add.php">
									<span class="pull-right label label-success">add</span>
									<i class="fa fa-plus" aria-hidden="true"></i>
									<span>Product</span>
								</a>
							</li>
							<li>
								<a href="product-list.php">
									<span class="pull-right label label-info">list</span>
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<span>Product</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-parent">
						<a href="javascript:void(0);" class="waves-effect">
							<i class="fa fa-shopping-cart" ></i>
							<span>Orders</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="order-list.php">
									<span class="pull-right label label-info">list</span>
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<span>Order</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-parent">
						<a href="javascript:void(0);" class="waves-effect">
							<i class="fa fa-user" ></i>
							<span>Customers</span>
						</a>
						<ul class="nav nav-children">
							<li>
								<a href="customer-list.php">
									<span class="pull-right label label-info">list</span>
									<i class="fa fa-tasks" aria-hidden="true"></i>
									<span>Customer</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>

			<hr class="separator" />
		</div>

	</div>

</aside>