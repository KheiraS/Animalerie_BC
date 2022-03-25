<?php
namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Category{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(name: 'name',nullable: 'false', type: 'string', length: 255)]
    private $name;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'cat_child')]
    private $cat_parent;

    #[ORM\OneToMany(mappedBy: 'cat_parent', targetEntity: self::class)]
    private $cat_children;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Product::class)]
    private $products;


    public function __toString() {
        return $this->name;
    }
    public function __construct()
    {
        $this->cat_children = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getCatParent(): ?self
    {
        return $this->cat_parent;
    }

    public function setCatParent(?self $cat_parent): self
    {
        $this->cat_parent = $cat_parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCatChildren(): Collection
    {
        return $this->cat_children;
    }

    public function addCatChildren(self $catChildren): self
    {
        if (!$this->cat_children->contains($catChildren)) {
            $this->cat_children[] = $catChildren;
            $catChildren->setCatParent($this);
        }

        return $this;
    }

    public function removeCatChildren(self $catChildren): self
    {
        if ($this->cat_child->removeElement($catChildren)) {
            // set the owning side to null (unless already changed)
            if ($catChildren->getCatParent() === $this) {
                $catChildren->setCatParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCategory($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategory() === $this) {
                $product->setCategory(null);
            }
        }

        return $this;
    }

}