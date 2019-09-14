/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   burningship.c                                      :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/05 20:57:51 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:17:51 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

static void	ft_burning_ship_calcul(t_all *all)
{
	all->fra.c_r = (all->fra.x / all->key.zoom + all->fra.x1)
		+ all->fra.mx - 3.00;
	all->fra.c_i = (all->fra.y / all->key.zoom + all->fra.y1)
		+ all->fra.my - 0.70;
	all->fra.z_r = 0;
	all->fra.z_i = 0;
	while (all->fra.z_r * all->fra.z_r + all->fra.z_i * all->fra.z_i < 4
			&& all->fra.i < all->fra.max_iter)
	{
		all->fra.tmp = all->fra.z_r;
		all->fra.z_r = all->fra.z_r * all->fra.z_r - all->fra.z_i
			* all->fra.z_i + all->fra.c_r;
		all->fra.z_i = 2 * fabs(all->fra.z_i * all->fra.tmp) + all->fra.c_i;
		all->fra.i++;
	}
}

int			ft_burning_ship(t_all *all)
{
	all->fra.i = 0;
	all->fra.x = 0;
	all->fra.y = 0;
	while (all->fra.y < all->mlx.height)
	{
		while (all->fra.x < all->mlx.width)
		{
			ft_burning_ship_calcul(all);
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
