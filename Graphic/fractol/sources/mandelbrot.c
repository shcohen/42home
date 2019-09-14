/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   mandelbrot.c                                       :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/05 20:57:30 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:21:48 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

static void	ft_mandelbrot_calcul(t_all *all)
{
	all->fra.c_r = (all->fra.x / all->key.zoom + all->fra.x1)
		+ all->fra.mx - 2.90;
	all->fra.c_i = (all->fra.y / all->key.zoom + all->fra.y1)
		+ all->fra.my - 1.40;
	all->fra.z_r = 0;
	all->fra.z_i = 0;
	while (all->fra.z_r * all->fra.z_r + all->fra.z_i * all->fra.z_i < 4
			&& all->fra.i < all->fra.max_iter)
	{
		all->fra.tmp = all->fra.z_r;
		all->fra.z_r = all->fra.z_r * all->fra.z_r - all->fra.z_i
			* all->fra.z_i + all->fra.c_r;
		all->fra.z_i = 2 * all->fra.z_i * all->fra.tmp + all->fra.c_i;
		all->fra.i++;
	}
}

int			ft_mandelbrot(t_all *all)
{
	all->fra.i = 0;
	all->fra.x = 0;
	all->fra.y = 0;
	while (all->fra.y < all->mlx.height)
	{
		while (all->fra.x < all->mlx.width)
		{
			ft_mandelbrot_calcul(all);
			if (all->fra.i == all->fra.max_iter)
				mlx_pixel_put_to_image(all, all->fra.x, all->fra.y, 0x000000);
			else
				mlx_pixel_put_to_image(all, all->fra.x, all->fra.y,
						all->fra.i * ft_rgb_color(all));
			all->fra.x++;
			all->fra.i = 0;
		}
		all->fra.x = 0;
		all->fra.y++;
	}
	return (0);
}
